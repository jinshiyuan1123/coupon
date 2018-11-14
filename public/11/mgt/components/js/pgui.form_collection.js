define([
    'class',
    'pgui.shortcuts',
    'pgui.editors',
    'pgui.validation',
    'pgui.modal_operation_link',
    'jquery.form'
], function (Class, shortcuts, editors, validation, modalLink) {
    var FormCollection = Class.extend({

        init: function ($formsContainer, $collectionContainer, newFormUrl, callbacks) {
            var self = this;

            this.forms = [];
            this.editorControllers = [];
            this.$formsContainer = $formsContainer;
            this.$collectionContainer = $collectionContainer;
            this.callbacks = $.extend({
                init: function() {},
                done: function () {},
                copy: function ($sourceForm, content) {
                    self.copy($sourceForm, $(content));
                }
            }, callbacks);

            $.each($formsContainer.find('form').toArray().reverse(), function (i, form) {
                this.add($(form));
            }.bind(this));

            applyShortcuts($formsContainer);

            this.$formsContainer.on('click', '.js-save', this.submit.bind(this));

            var formCollection = this;
            this.$formsContainer
                .on('click', '.js-form-add', function (e) {
                    e.preventDefault();
                    $.get(newFormUrl, function (response) {
                        formCollection.add($(response));
                    });
                })
                .on('click', '.js-form-copy', function (e) {
                    var $sourceForm = $(e.target).closest('form');
                    $.get(newFormUrl, function (content) {
                        self.callbacks.copy($sourceForm, content);
                    }.bind(this));
                });
        },

        submit: function (e) {
            e.preventDefault();

            var submitParams = $(e.target).data();
            this.setLoading(true);

            var promises = $.map(this.forms, function (form) {
                return submit($(form));
            });

            $.when.apply($, $.map(promises, function(promise) {
                return promise.then(null, function() {
                    return $.Deferred().resolveWith(this, arguments);
                });
            })).done(function (responses) {
                var responses =  Array.prototype.slice.call(arguments);
                var hasErrors = responses.reduce(function (hasErrors, response) {
                    return !response.success || hasErrors;
                }, false);

                $.each(responses, function (i, response) {
                    if (hasErrors && response.success) {
                        this.remove(response.$form);
                    }
                }.bind(this));

                if (hasErrors) {
                    this.$formsContainer.find('.has-error input,textarea,select').first().focus();
                }

                if (this.callbacks.done(hasErrors, responses, submitParams)) {
                    this.setLoading(false);
                }

            }.bind(this));
        },

        add: function ($form, initCallback) {
            var self = this;

            if (this.$collectionContainer.has($form).length === 0) {
                this.$collectionContainer.append('<hr/>').append($form);
            }

            $form.pgui_validate_form();

            $form.on('submit', function (e) {
                e.preventDefault();
            });

            this.forms.push($form);
            this.editorControllers.push(editors.init($form, function (controller) {
                self.callbacks.init(self);

                _.each(controller.editors, function (editor) {
                    nestedInsert(editor);
                });

                if (typeof(initCallback) === 'function') {
                    initCallback();
                }
            }));

            if (this.forms.length > 1) {
                this.$formsContainer.find('.js-multiple-insert-hide').hide();
                this.$formsContainer.find('.js-form-remove').show();
            }

            $form.on('click', '.js-form-remove', function () {
                this.remove($form);
            }.bind(this));

            $form.find('input,select,textarea').filter(':visible').first().focus();

            return $form;
        },

        copy: function ($sourceForm, $targetForm) {
            return this.add($targetForm, _.bind(function () {
                this.copyEditorsValues($sourceForm, $targetForm);
            }, this));
        },

        copyEditorsValues: function ($sourceForm, $targetForm) {
            $sourceForm.find('[data-editor]').each(function (i, el) {
                var $el = $(el);
                var targetEditor = $targetForm
                    .find('[data-field-name="' + $el.data('field-name') + '"]')
                    .data('editor');

                if (targetEditor && $el.data('editor')) {
                    targetEditor.setData($el.data('editor').getData());
                }
            });
        },

        remove: function ($form) {
            var index = $.map(this.forms, function ($f) {
                return $f.attr('id');
            }).indexOf($form.attr('id'));

            this.forms.splice(index, 1);
            this.editorControllers[index].destroy();
            this.editorControllers.splice(index, 1);

            $form.prev('hr').remove();
            $form.remove();

            this.$collectionContainer.find('hr:first-child').remove();

            if (this.forms.length === 1) {
                this.$formsContainer.find('.js-form-remove').hide();
                this.$formsContainer.find('.js-multiple-insert-hide').show();
            }

            return this.forms;
        },

        get: function (index) {
            return this.forms[index];
        },

        setLoading: function (isLoading) {
            var $buttons = this.$formsContainer.find('.btn-toolbar button.btn-primary,.js-save,.js-cancel').prop('disabled', isLoading);

            if (isLoading) {
                $buttons.addClass('btn-loading');
            } else {
                $buttons.removeClass('btn-loading');
            }
        },

        focus: function () {
            this.forms[0].find('input,select,textarea').first().focus();
        },

        destroy: function () {
            _.each(this.editorControllers, function (editorController) {
                editorController.destroy()
            });

            this.forms = [];
            this.editorControllers = [];
        }
    });

    function submit($form) {
        var $errorContainer = $form.find('.form-error-container').html('');
        var deferred = $.Deferred();

        $form.ajaxSubmit({
            dataType: 'JSON',
            beforeSubmit: function () {
                var result = validation.validateForm($form, $errorContainer, false);

                if (!result.success) {
                    appendError($errorContainer, result.message);
                    deferred.reject($.extend({$form: $form}, result));
                }

                return result.success;
            },
            success: function (response) {
                if (!response.success) {
                    appendError($errorContainer, response.message);
                    deferred.reject($.extend({$form: $form}, response));
                    return;
                }

                deferred.resolve($.extend({$form: $form}, response));
            }
        });

        return deferred.promise();
    }

    function applyShortcuts($formsContainer) {
        if ($formsContainer.hasClass('modal')) {
            $formsContainer.one('shown.bs.modal', function () {
                shortcuts.push(['form']);
            }).one('hidden.bs.modal', function () {
                shortcuts.pop();
            });
        } else {
            shortcuts.push(['form']);
        }
    }

    function appendError($errorContainer, message) {
        if (!message) {
            return;
        }

        $('<div class="alert alert-danger">'
            + '<button data-dismiss="alert" class="close" type="button">&times;</button>'
            + message
            + '</div>').appendTo($errorContainer);
    }

    function nestedInsert(editor) {
        var $insertButton = editor.rootElement.closest('.input-group').find('.js-nested-insert').first();

        if ($insertButton && !$insertButton.data('insert-link')) {
            var dataLink = modalLink.createInsertLink(FormCollection, $insertButton, null, function (hasErrors, responses) {
                if (!hasErrors) {
                    editor.trigger(
                        'submit.pgui.nested-insert',
                        $insertButton, responses[0].primaryKeys[0], responses[0].record
                    );
                }
            });

            $insertButton.data('insert-link', dataLink);
        }
    }

    return FormCollection;

});

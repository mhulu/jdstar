<template>
    <transition v-if="show" name="modal">
        <!-- <div class="modal" @click.self="clickMask"> -->
        <div class="modal">
            <div class="modal-dialog" :class="modalClass">
                <div class="modal-content">

                    <div class="modal-header">
                        <slot name="header">
                            <a type="button" class="close" @click="cancel"><i class="fa fa-times-circle"></i></a>
                            <h4 class="modal-title">
                                <slot name="title">
                                    {{title}}
                                </slot>
                            </h4>
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot></slot>
                    </div>

                    <div class="modal-footer" v-if="showFooter">
                        <slot name="footer">
                            <button type="button" :class="cancelClass" @click="cancel">{{cancelText}}</button>
                            <button type="button" :class="confirmClass" @click="confirm">{{confirmText}}</button>
                        </slot>
                    </div>

                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            show: {
                type: Boolean,
                default: false
            },
            title: {
                type: String,
                default: 'Modal'
            },
            small: {
                type: Boolean,
                default: false
            },
            large: {
                type: Boolean,
                default: true
            },
            full: {
                type: Boolean,
                default: false
            },
            force: {
                type: Boolean,
                default: false
            },
            confirmText: {
                type: String,
                default: '确定'
            },
            cancelText: {
                type: String,
                default: '取消'
            },
            confirmClass: {
                type: String,
                default: 'btn btn-info'
            },
            cancelClass: {
                type: String,
                default: 'btn btn-outline'
            },
            closeWhenConfirm: {
                type: Boolean,
                default: false
            },
            showFooter: {
                type: Boolean,
                default: false
            }
        },
        data () {
            return {
                duration: null
            };
        },
        computed: {
            modalClass () {
                return {
                    'modal-lg': this.large,
                    'modal-sm': this.small,
                    'modal-full': this.full
                }
            }
        },
        created () {
            if (this.show) {
                document.body.className += ' modal-open';
            }
        },
        beforeDestroy () {
            document.body.className = document.body.className.replace(/\s?modal-open/, '');
        },
        watch: {
            show (value) {
                if (value) {
                    document.body.className += ' modal-open';
                } else {
                    if (!this.duration) {
                        this.duration = window.getComputedStyle(this.$el)['transition-duration'].replace('s', '') * 1000;
                    }
                    window.setTimeout(() => {
                        document.body.className = document.body.className.replace(/\s?modal-open/, '');
                    }, this.duration || 0);
                }
            }
        },
        methods: {
            confirm () {
                this.$emit('confirm');
                if (this.closeWhenConfirm) {
                    this.cancel()
                }
            },
            cancel () {
                this.$emit('cancel');
            },
            clickMask () {
                if (!this.force) {
                    this.cancel();
                }
            }
        }
    };
</script>

<style scoped>
    .modal {
        display: block;
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        transition: opacity .3s ease;
    }

    .modal-header {
        padding-bottom: 25px;
        border: none;
    }

    .modal-dialog {
        display: table;
        vertical-align: middle;
        margin: 30px auto;
    }

    .modal-content {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-content,
    .modal-leave-active .modal-content {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    .btn-outline {
        color: #fff;
    }
    .modal-full {
      margin: 0;
      margin-right: auto;
      margin-left: auto;
      width: 100%;
  }
  @media (min-width: 768px) {
      .modal-full {
        width: 750px;
    }
}
@media (min-width: 992px) {
  .modal-full {
    width: 970px;
}
}
@media (min-width: 1200px) {
  .modal-full {
   width: 1170px;
}
}
</style>
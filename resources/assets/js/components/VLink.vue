<template>
    <a
        :href="href"
        :class="linkClass"
        @click="go"
    >
        <slot></slot>
    </a>
</template>

<script>
    import routes from '../routes';

    export default {
        props: {
            href: {
                type:String,
                required: true
            },
            activeStyle: {
                type: Boolean,
                required: false,
                default: true
            }
        },
        computed: {
            linkClass () {
                const classes = [];
                if (this.activeStyle) {
                    classes.push('has-active-style');
                }
                if (this.href === this.$root.currentRoute) {
                    classes.push('is-active');
                }
                return classes.join(' ');
            }
        },
        methods: {
            go (event) {
                event.preventDefault()
                this.$root.currentRoute = this.href
                window.history.pushState(
                    null,
                    routes[this.href],
                    this.href
                )
            }
        }
    }
</script>

<style lang="scss" scoped>
    a.has-active-style {
        display: inline-block;
        transition: .3s;
        border-bottom: .05em solid transparent;
    }
    a.has-active-style.is-active {
        border-bottom: .05em solid rgba(white, .25);
    }
    a.has-active-style:hover {
        border-bottom: .05em solid white;
    }
</style>

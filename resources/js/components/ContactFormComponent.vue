<template>
    <b-form class="my-3 mx-2">
        <b-form-input
            v-model="querySearch"
            type="text" class="text-center"
            placeholder="Buscar contacto..." require >
        </b-form-input>
    </b-form>
</template>

<script>
    export default {
        computed: {
            querySearch: {
                get() {
                    return this.$store.state.querySearch
                },
                set(value) {
                    this.$store.commit('newQuerySearch', value);
                }
            }
        }
    }
</script>
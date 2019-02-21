<template>
    <ContentWrapper>
        <form @submit.prevent="onSubmit">
            <div v-for="(fields, field_group) in field_groups">
                <div class="card card-default">
                    <div v-if="field_group !== 'default'" class="card-header">{{field_group}}</div>
                    <div class="card-body">
                        <div class="form-row align-items-center">
                            <div v-for="(field, fieldIndex) in fields" class="col">
                                <label class="">{{field.label}}</label>
                                <input v-model="field.value" class="form-control" type="text" v-if="field.type === 'string'"/>
                                <input v-model="field.value" class="form-control" type="number" v-if="field.type === 'int'"/>
                                <textarea v-model="field.value" class="form-control" v-if="field.type === 'text'"></textarea>
                                <div v-if="field.type === 'json'" class="" v-for="(repeater_field, repeater_index) in field.value">
                                    <b-input-group>
                                        <b-form-input v-model="field.value[repeater_index]"></b-form-input>
                                        <b-input-group-append>
                                            <b-btn variant="success" @click="field.value.push('')"><i class="fas fa-plus" style="color:white"></i>
                                            </b-btn>
                                            <b-btn v-if="repeater_index > 0" variant="danger" @click="field.value.splice(repeater_index, 1)">
                                                <i class="fas fa-trash" style="color:white"></i></b-btn>
                                        </b-input-group-append>
                                    </b-input-group>
                                </div>
                                <b-input-group v-if="field.type === 'currency'" prepend="$">
                                    <b-form-input :type="'number'" v-model="field.value"></b-form-input>
                                </b-input-group>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mb-2" type="submit">Submit</button>

        </form>
    </ContentWrapper>
</template>

<script>
    export default {
        name: "EditClientProduct",
        data() {
            return {
                field_groups: '',
            }
        },
        created() {
            let self = this
            axios.get('api/client-products/' + this.$route.params.slug)
                .then(function (res) {
                    for (let i in res.data) {
                        for (let key in res.data[i]) {
                            if (res.data[i][key].type === 'json' && !res.data[i][key].value) {
                                res.data[i][key].value = [''];
                            }
                        }
                    }
                    self.field_groups = res.data
                })
        },
        methods: {
            onSubmit: function () {
                let self = this
                axios.patch('api/client-products/' + self.$route.params.slug, self.field_groups)
                    .then()
                    .catch()
            }
        }
    }
</script>

<style scoped>

</style>

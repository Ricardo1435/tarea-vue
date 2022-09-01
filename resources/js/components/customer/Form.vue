<template>
    <div class="container md mt-2 col-lg-12">
    <div class="card border-info">
        <div>
            <div class="card-header bg-info text-white">
                {{
                    isEditCustomer ? "EDITAR CLIENTE" : "REGISTRAR CLIENTE"
                }}
            </div>
            <div class="card-body">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" required id="name"  v-model="name"/>
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" required id="address" v-model="address"/>
            </div>
            <div class="form-group">
                <label for="phone_number">Teléfono</label>
                <input type="text" class="form-control" required id="phone_number" v-model="phone_number"/>
            </div>

            <div class="text-center">
                <button class="btn btn-primary my-2" @click.prevent="saveHandler" v-if="!isEditCustomer">Guardar</button>
                <button class="btn btn-primary my-2" @click.prevent="updateHandler" v-else>Actualizar</button>
                <button class="btn btn-secondary my-2" @click.prevent="cancelHandler">Cancelar</button>
            </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        name: "",
        address: "",
        phone_number: "",
    }),
    props: {
        customer: {
            type: Object,
            default: {},
        },
    },
    computed: {
        isEditCustomer() {
            return !!this.customer && Object.keys(this.customer).length !== 0;
        },
    },
    methods: {
        saveHandler() {
            this.$emit("save", {
                name: this.name,
                address: this.address,
                phone_number: this.phone_number,
            });
        },
        updateHandler() {
            this.$emit("update", {
                id: this.customer.id,
                name: this.name,
                address: this.address,
                phone_number: this.phone_number,
            });
        },
        updateCustomerInfo() {
            this.name = this.customer.name;
            this.phone_number = this.customer.phone_number;
            this.address = this.customer.address;
        },
        cleanCustomerInfo() {
            this.name = "";
            this.phone_number = "";
            this.address = "";
        },
        cancelHandler() {
            this.$emit("cancel");
        },
        cancelEditHandler() {
            this.$emit("cancelEdit");
        },
    },
};
</script>

<style></style>

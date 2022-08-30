import axios from "axios";

export default {
    createCustomer(customer) {
        return axios.post("/customer", customer);
    },
    deleteCustomer(id) {
        return axios.delete(`/customer/${id}`);
    },
    getCustomers() {
        return axios.get("/customers");
    },
    getCustomer(id) {
        return axios.get(`/customer/${id}`);
    },
    updateCustomer(id, customer) {
        return axios.patch(`/customer/${id}`, customer);
    },
};

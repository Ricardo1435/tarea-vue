<template>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" @click="closeModal">&times;</span>
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        closeModal() {
            const modal = document.getElementById("myModal");
            modal.style.display = "none";
        },
        showModal() {
            const modal = document.getElementById("myModal");
            modal.style.display = "block";
        },
    },
};
</script>

<style scoped>
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0, 0, 0); /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

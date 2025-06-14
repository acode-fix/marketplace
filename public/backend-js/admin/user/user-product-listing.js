import { getToken } from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;

document.addEventListener("DOMContentLoaded", function () {
    let dataTableInstance;

    // Initialize the DataTable
    dataTableInstance = $("#datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: function (data, callback, settings) {
            const page = data.start / data.length + 1;
            const perPage = data.length;
            const searchTerm = data.search.value;

            axios
                .get("/api/v1/admin/user-product-listing", {
                    params: {
                        page: page,
                        per_page: perPage,
                        search: searchTerm,
                    },
                })
                .then((response) => {
                    const result = response.data;

                    // Pass data to DataTable
                    callback({
                        draw: data.draw,
                        recordsTotal: result.total,
                        recordsFiltered: result.filtered_total,
                        data: result.users,
                    });
                })
                .catch((error) => {
                    console.log("Error fetching data:", error);
                });
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart;
                },
            },
            {
                data: "name",
                render: function (data) {
                    return data ? data : "N/A";
                },
            },
            {
                data: "email",
                render: function (data) {
                    return data ? data : "N/A";
                },
            },
            {
                data: "address",
                render: function (data) {
                    return data ? data : "N/A";
                },
            },
            {
                data: "phone_number",
                render: function (data) {
                    return data ? data : "N/A";
                },
            },
            {
                data: "products",
                render: function (data) {
                    return data ? data?.length : "N/A";
                },
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {
                    return `<button class="btn btn-sm btn-light user-link" data-user-id="${data.id}">Full details</button>`;
                },
            },
        ],
        responsive: true,
    });

    // Search input handler
    $("#datatable_filter input").on("keyup", function () {
        dataTableInstance.search(this.value).draw();
    });

    let UnlistedDataTableInstance;

    // Initialize the DataTable
    UnlistedDataTableInstance = $("#datatable2").DataTable({
        processing: true,
        serverSide: true,
        ajax: function (data, callback, settings) {
            const page = data.start / data.length + 1;
            const perPage = data.length;
            const searchTerm = data.search.value;

            axios
                .get("/api/v1/admin/users/unlisted-products", {
                    params: {
                        page: page,
                        per_page: perPage,
                        search: searchTerm,
                    },
                })
                .then((response) => {
                    const result = response.data;

                    // Pass data to DataTable
                    callback({
                        draw: data.draw,
                        recordsTotal: result.total,
                        recordsFiltered: result.filtered_total,
                        data: result.users,
                    });
                })
                .catch((error) => {
                    console.log("Error fetching data:", error);
                });
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart;
                },
            },
            {
                data: "name",
                render: function (data) {
                    return data ? data : "N/A";
                },
            },
            {
                data: "email",
                render: function (data) {
                    return data ? data : "N/A";
                },
            },
            {
                data: "address",
                render: function (data) {
                    return data ? data : "N/A";
                },
            },
            {
                data: "phone_number",
                render: function (data) {
                    return data ? data : "N/A";
                },
            },
            {
                data: "products",
                render: function (data) {
                    return data ? data?.length : "N/A";
                },
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {
                    return `<button class="btn btn-sm btn-light user-link" data-user-id="${data.id}">Full details</button>`;
                },
            },
        ],
        responsive: true,
    });

    $("#datatable2_filter input").on("keyup", function () {
        UnlistedDataTableInstance.search(this.value).draw();
    });
});

document.addEventListener("click", (event) => {
    if (event.target.classList.contains("user-link")) {
        event.preventDefault();

        const userId = event.target.dataset.userId;

        localStorage.setItem("userId", JSON.stringify(userId));
        window.location.href = "/admin/view/user";
    }
});

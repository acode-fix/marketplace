import { serverError } from "./auth-helper.js";
import {
    getRegisteredUser,
    calculateTotal,
    getSuspendedUsers,
    getDeletedUsers,
    getListedProducts,
    getDelistedProducts,
    getBadgeDetails,
    logout,
    loadDashboard,
} from "./helper/helper.js";
import { getDashboardStatistics } from "./services/dashboard-statistics.js";

const token = localStorage.getItem("token");

axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;

if (!token) {
    Swal.fire({
        icon: "error",
        title: "Unauthenticated User",
        confirmButtonColor: "#ffb705",
        text: "Please log in.",
    }).then(() => {
        window.location.href = "/admin/login";
    });
} else {
    axios
        .get("/api/v1/getuser", {})
        .then((response) => {
            //console.log(response)
        })
        .catch((error) => {
            console.log(error);
        });
}

loadDashboard();

document.querySelectorAll(".views").forEach((view) => {
    view.addEventListener("click", () => {
        axios
            .get("/api/v1/verify/user")
            .then((response) => {
                // console.log(response);

                if (response.status === 200 && response.data) {
                    const data = response.data.data;
                    //console.log(data);

                    localStorage.setItem("userData", JSON.stringify(data));

                    window.location.href = "/admin/verification/view";
                }

                if (response.status === 500) {
                    serverError();
                }
            })
            .catch((error) => {
                //console.log(error);

                if (error.response) {
                    if (error.response.status === 404 && error.response.data) {
                        Swal.fire({
                            icon: "error",
                            confirmButtonColor: "#ffb705",
                            title: "Loading All User",
                            text: error.response.data.message,
                        });
                    }
                }
            });
    });
});

document.querySelectorAll(".get-users").forEach((user) => {
    user.addEventListener("click", (event) => {
        event.preventDefault();

        window.location.href = "/admin/dashboard/alluser";
    });
});

async function dashboardStatistics(){
   
   const data = await getDashboardStatistics();

    const totalEl = document.querySelector(".user-with-product");
    const totalEl2 = document.querySelector(".user-with-no-product");

    displayTotal(data.data.userWithProducts, totalEl);
    displayTotal(data.data.userWithNoProducts, totalEl2);
}

 dashboardStatistics()

async function fetchRegisteredUser() {
    const users = await getRegisteredUser();


    const totalEl = document.querySelector(".js-total-user");
    const content = "Users";

    displayTotal(users.total, totalEl, content);
}

fetchRegisteredUser();

async function fetchSuspendedUsers() {
    const users = await getSuspendedUsers();

    // const total = calculateTotal(users);

    const totalEl = document.querySelector(".suspended-user");

    const content = "Users";

    displayTotal(users.total, totalEl, content);
}

fetchSuspendedUsers();

async function getDeletedAccounts() {
    const users = await getDeletedUsers();

    //const total = calculateTotal(users);

    const totalEl = document.querySelector(".deleted-user");

    const content = "Users";

    displayTotal(users.total, totalEl, content);
}

getDeletedAccounts();

async function getActiveProducts() {
    const products = await getListedProducts();

    //const total = calculateTotal(products);
    const totalEl = document.querySelector(".total-products");

    const content = "Products";

    displayTotal(products.total, totalEl, content);
}

getActiveProducts();

async function getDeletedProducts() {
    const products = await getDelistedProducts();

    //const total = calculateTotal(products);
    const totalEl = document.querySelector(".deleted-products");

    const content = "Products";

    displayTotal(products.total, totalEl, content);
}
getDeletedProducts();

async function getActiveBadges() {
    const users = await getBadgeDetails();

    const activeBadges = users.data.activeBadges;
    const expiredBadges = users.data.expiredBadges;
    const unverifiedUser = users.data.unverifiedUser;

    const total = calculateTotal(activeBadges);
    const totalEl = document.querySelector(".total-active");

    const total1 = calculateTotal(expiredBadges);
    const totalEl1 = document.querySelector(".total-expired");

    const total2 = calculateTotal(unverifiedUser);
    const totalEl2 = document.querySelector(".total-unverified");

    const content = "Users";

    displayTotal(total, totalEl, content);
    displayTotal(total1, totalEl1, content);
    displayTotal(total2, totalEl2, content);
}

getActiveBadges();

function displayTotal(total, totalEl) {
    if (totalEl) {
        totalEl.innerHTML = `${total}`;
    }
}

function displayTotalProducts(total, totalEl) {
    if (totalEl) {
        totalEl.innerHTML = `Total Number Of  Products :: ${total}`;
    }
}

document.querySelector(".log-out").addEventListener("click", () => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ffb705",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes,I am sure!",
    }).then((result) => {
        if (result.isConfirmed) {
            logout();
        }
    });
});

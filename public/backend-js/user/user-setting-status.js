import dayjs from 'https://unpkg.com/dayjs@1.11.10/esm/index.js';

const token = localStorage.getItem("apiToken");

axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;

export async function checkUserSettingStatus() {
    if (!token || window.location.pathname.includes('/settings')) {
        return;
    }
    try {
        const response = await axios.get("/api/v1/user");
        if (response.status === 200 && response.data) {
            const data = response.data.data.user;
            notify(data);
        }
    } catch (error) {
        console.log(error);
    }
}

checkUserSettingStatus()

 function notify(data) {
    const {
        username,
        phone_number: phone,
        shop_address: shop,
        business_location: business,
        bio,
        created_at,
    } = data;

    const isNewUser = dayjs().diff(dayjs(created_at), 'hour') < 24;

    if (isNewUser) return;

    if (!username || !phone || !shop || !business || !bio) {
        Swal.fire({
            title: "Update!",
            text: "We are pleased to announce that the shop settings page has been modify to accommodate your shop location and shop address, visit settings to update your information",
            icon: "warning",
            confirmButtonColor: "#ffb705",
            confirmButtonText: "Go to settings",
            willClose: function () {
                window.location.href = "/settings";
            },
        });
    }
}

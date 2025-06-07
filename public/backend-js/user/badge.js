import {
    getToken,
    validationError,
    displaySwal,
    generateAvatar,
    showLoader,
    hideLoader,
} from "../helper/helper.js";
import { serverError } from "../admin/auth-helper.js";

import { checkUserSettingStatus } from "./user-setting-status.js";

checkUserSettingStatus();

const token = getToken();

if (token) {
    axios
        .get("/api/v1/getuser", {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        })
        .then((response) => {
            //console.log(response)
            if (response.status === 200 && response.data) {
                const data = response.data;

                loadUserDetails(data);
            }
        })
        .catch((error) => {
            // console.log(error);
        });

    function loadUserDetails(data) {
        const img = data.photo_url
            ? `<img class="img-fluid dp ms-3 badge-img"  src="/uploads/users/${data.photo_url}" alt="">`
            : `<img class="img-fluid dp ms-3 badge-img"  src="${generateAvatar(
                  data.email
              )}" alt="">`;

        const display = ` <div style="margin-top: -30px;">
          ${img}
          <div class="vetted">
            <img  width="20px" height="20px" src="/kaz/images/badge.png" alt="">
          </div>
        </div>
        <div class="ms-4  augustine1">
          <div style="display: flex; align-items: start;">
            <h5 class="modal-mire">${data.name ?? "N/A"}</h5>
            <img class="ms-2" src="/kaz/images/badge.png" alt="">
          </div>
          <h6 class="modal-augustine" style="margin-top: -10px;">${
              data.email
          }</h6>
          <h6 class="vetted-seller pt-2 fw-bold">vetted seller badge</h6>
        </div>

        <div class="augustine2">
          <div style="display: flex; align-items: start;">
            <h5 class="modal-mire">${data.name} </h5>
             <img class="ms-2" src="/kaz/images/badge.png" alt=""> 
          </div>
          <h6 class="modal-augustine" style="margin-top: -10px;">${
              data.email
          }</h6>
          <h6 class="vetted-seller pt-2 fw-bold">vetted seller badge</h6>
        </div>`;

        document.querySelector(".js-content").innerHTML = display;
    }

    document.querySelector(".next-btn").addEventListener("click", (event) => {
        event.preventDefault();

        const badgeType = document.querySelector(
            'input[name="badge_type"]:checked'
        );

        if (!badgeType) {
            document.querySelector(".error").innerHTML =
                "* Badge type is required *";
        } else {
            const continueBtn = document.querySelector(".badge-btn");
            const signupText = document.querySelector(".bio-text");
            const loader = document.querySelector(".loader-layout");

            showLoader(continueBtn, signupText, loader);

            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;

            const form = document.getElementById("form1");
            const formData = new FormData(form);

            for (let field of formData) {
                //  console.log(field[0] +':' + field[1]);
            }

            axios
                .post("/api/v1/verify/badge", formData, {
                    headers: {
                        "Content-type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    // console.log(response);

                    hideLoader(continueBtn, signupText, loader);

                    if (response.status === 200 && response.data) {
                        let timerInterval;
                        Swal.fire({
                            icon: "success",
                            title: "Badge Type Submission Successful",
                            confirmButtonColor: "#ffb705",
                            text: response.data.message,
                            timer: 2000,
                            timerProgressBar: true,

                            didOpen: () => {
                                Swal.showLoading();
                                const timer =
                                    Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {}, 1000);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                                window.location.href = "/success";
                            },
                        });
                    }
                })
                .catch((error) => {
                    //console.log(error);
                    hideLoader(continueBtn, signupText, loader);

                    if (error.response) {
                        if (
                            error.response.status === 422 &&
                            error.response.data
                        ) {
                            const fieldError = error.response.data.errors;

                            const msg = validationError(fieldError);

                            displaySwal(msg);
                        }
                        if (
                            error.response.status === 404 &&
                            error.response.data
                        ) {
                            Swal.fire({
                                icon: "error",
                                confirmButtonColor: "#ffb705",
                                title: "Identification Error",
                                text: error.response.data.message,
                            });
                        }
                        if (
                            error.response.status === 400 &&
                            error.response.data
                        ) {
                            Swal.fire({
                                icon: "error",
                                title: "Submission Error",
                                confirmButtonColor: "#ffb705",
                                text: error.response.data.message,
                            });
                        }

                        if (error.response.status === 500) {
                            serverError();
                        }
                    }
                });
        }
    });
} else {
    // console.log('no');
}

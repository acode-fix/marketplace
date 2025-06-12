import { loadResponse } from "../helper/helper.js";

export default function verificationBtnStatus(user) {
    if (user.verify_status == 1 && user.badge_status == 1) {
        //active verification
        const title = '<span class="text-success">verified seller</span>';
        const content =
            '<span class="text-dark">You have an active badge</span>';

         loadResponse(title, content);
    }

    if (user.verify_status == -2 && user.badge_status == 0) {
        //Pending verification
        const title = '<span class="text-success">Pending Verification</span>';
        const content =
            '<span class="text-dark">Awaiting Admin Approval </span>';

       loadResponse(title, content);
    }

    if (user.verify_status == 0 && user.badge_status == 0) {
        //No verification and no active badge
        window.location.href = "/become";
    }

    if (user.verify_status == 1 && user.badge_status == -1) {
        //badge expired
        window.location.href = "/badge";
    }

    if (user.verify_status == -1 && user.badge_status == 0) {
        //verification declined
        const title = '<span class="text-danger">Declined verification</span>';
        const content =
            '<span class="text-dark">Contact for support for more info!!</span>';

        loadResponse(title, content);
    }
}

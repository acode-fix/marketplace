{{-- <script>
    // Fetch the user data
    const token = localStorage.getItem('apiToken'); // Get the token from local storage
   // console.log(token)

if (token) {
    axios.get('/api/v1/getuser', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
    .then(response => {
        const user = response.data;
        updateUserProfile(user);
    })
    .catch(error => {
        console.error('Error fetching user data:', error);
        if (error.response && error.response.status === 401) {
            Swal.fire({
                icon: 'error',
                title: 'Unauthorized',
                text: 'Your session has expired. Please log in again.'
            }).then(() => {
                window.location.href = '/'; // Redirect to login page
            });
        }
    });
} else {

    console.log('yes')
    Swal.fire({
        icon: 'error',
        title: 'Missing Token',
        text: 'Please log in.'
    }).then(() => {
        window.location.href = '/'; // Redirect to login page
    });
}

function updateUserProfile(user) {
    const nameElement = document.querySelector('.right-section .name');
    const emailElement = document.querySelector('.right-section .mired-text');
    const profileImageElement = document.querySelector('.right-section .profile-picture');

    if (user) {
        nameElement.textContent = user.username || 'Unknown User';
        emailElement.textContent = user.email || 'No email provided';
        // profileImageElement.src = user.photo_url ? user.photo_url : 'kaz/images/dp.png';
        const imageUrl = user.photo_url ? `/uploads/users/${user.photo_url}` : 'kaz/images/dp.png';
        profileImageElement.src = imageUrl;
    } else {
        console.error('User data is null or undefined');
    }
}
</script> --}}



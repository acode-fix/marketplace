@extends('layouts.main.app')
@section('title','Learn')
@section('navtitle', 'Learn')

@section('content')
<div class="main">
    <div class="content">
        <div class="container mt-2">
            <div id="learn-container" class="outer-div">
                <!-- Dynamic content will be inserted here -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    axios.get('/api/videos')
        .then(function (response) {
            const learnContainer = document.getElementById('learn-container');
            response.data.forEach(item => {
                const card = document.createElement('div');
                card.classList.add('card', 'card-main');

                // Format views
                const formattedViews = new Intl.NumberFormat('en-US', { notation: 'compact', compactDisplay: 'short' }).format(item.views);

                // Calculate relative time
                const relativeTime = moment(item.created_at).fromNow();

                card.innerHTML = `
                    <iframe class="video-size" src="${item.url}" title="${item.title}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="card-body card-txt">
                        <p class="card-text new-tex">${item.title}</p>
                        <p class="fw-light footer-txt">${item.description} <br>
                            ${formattedViews} views ${relativeTime}</p>
                    </div>
                `;
                learnContainer.appendChild(card);
            });
        })
        .catch(function (error) {
            console.error('Error fetching learn data:', error);
        });
});
</script>

@endsection

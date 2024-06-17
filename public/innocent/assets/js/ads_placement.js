
const buttons = document.querySelectorAll('.radio-button');

buttons.forEach((button, index) => {
    const radioInput = document.createElement('input');
    radioInput.setAttribute('type', 'radio');
    radioInput.classList.add('form-check-input');

    if (index === 0) {
        radioInput.setAttribute('checked', 'checked');
    }

    let isChecked = button.classList.contains('checked');

    button.addEventListener('click', function() {
        if (!isChecked) {
            button.classList.add('checked');
            radioInput.checked = true;
            isChecked = true;
            updateAmount();
            checkNextButtonVisibility();
        } else {
            button.classList.remove('checked');
            radioInput.checked = false;
            isChecked = false;
            updateAmount();
            checkNextButtonVisibility();
        }
    });

    button.appendChild(radioInput);
});

function updateAmount() {
    const checkedButtons = document.querySelectorAll('.radio-button.checked');
    let totalAmount = 0;

    checkedButtons.forEach(button => {
        const amount = parseInt(button.getAttribute('data-amount'));
        const increase = parseInt(button.getAttribute('data-increase'));
        const selectedDays = parseInt(document.getElementById('daysRange').value);
        totalAmount += amount + (increase * (selectedDays - 1));
    });

    const amountDisplay = document.getElementById("amountDisplay");
    const vatDisplay = document.getElementById("vatDisplay");
    const rewards = document.getElementById("reward_earn");
    const extimate_reach= document.getElementById("extimate_reach");
    const totalDisplay = document.getElementById("total_display");

    amountDisplay.textContent = `₦${totalAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
    vatDisplay.textContent = `₦${(7.5 * totalAmount / 100).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
    rewards.textContent = `₦${(2 * totalAmount / 100).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
    extimate_reach.textContent = `${(  totalAmount / 1000)}%`;
    totalDisplay.textContent = `₦${(totalAmount + (7.5 * totalAmount / 100)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
}

function updateDays() {
    const rangeInput = document.getElementById("daysRange"); 
    const daysDisplay = document.getElementById("daysDisplay");
    const daysLimit = document.getElementById("days_limit");
    const selectedDays = parseInt(rangeInput.value);
    const rangeWidth = rangeInput.offsetWidth;
    const rangeValue = rangeInput.value;
    const rangeMax = rangeInput.max;
    

    if (selectedDays < 5) {
        daysLimit.style.display = "block";
        daysDisplay.style.display = "none"; 
        
        updateAmountWithZero();
    } else {
        const percentage = (rangeValue / rangeMax) * 100;
        const marginLeft = (percentage * rangeWidth) / 100;
        
        daysDisplay.textContent = selectedDays === 1 ? "1 day" : `${selectedDays} days`;
        daysDisplay.style.left = `${marginLeft - (daysDisplay.offsetWidth / 2)}px`;
        daysDisplay.style.display = "block";
        daysLimit.style.display = "none";
        updateAmount();
    }
}

function adjustRange(rangeInput) {
    if (rangeInput.value < 4) {
        rangeInput.value = 4;
    }
}

function updateAmountWithZero() {
    const amountDisplay = document.getElementById("amountDisplay");
    const vatDisplay = document.getElementById("vatDisplay");
    const extimate_reach = document.getElementById("extimate_reach");
    const rewards = document.getElementById("reward_earn");
    const totalDisplay = document.getElementById("total_display");

    amountDisplay.textContent = `₦0`;
    vatDisplay.textContent = `₦0`;
    extimate_reach.textContent = `0%`;
    rewards.textContent = `₦0`;
    totalDisplay.textContent = `₦0`;
}

function checkNextButtonVisibility() {
    const checkedButtons = document.querySelectorAll('.radio-button.checked');
    const nextButton = document.querySelector('.next_button1');

    if (checkedButtons.length > 0) {
        nextButton.style.display = 'inline';
    } else {
        nextButton.style.display = 'none';
    }
}

function upload_asd(){
    const Days = document.getElementById('daysRange').value;
    if(parseInt(Days)<5){
      
        return;
    }

    const upload = document.getElementById("main"); 
    upload.style.display = "none";
    const upload2 = document.getElementById("main2"); 
    upload2.style.display = "block";
    
    const userScrollButton = document.querySelector('.btn_to_choose_ads[data-amount="1200"]');
    const homePageButton = document.querySelector('.btn_to_choose_ads[data-amount="1500"]');
    
    const userScrollUpload = document.getElementById('user_scroll_view_upload');
    const homePageUpload = document.getElementById('home_page_banner_upload');
    
    if (userScrollButton.classList.contains('checked') && homePageButton.classList.contains('checked')) {
        userScrollUpload.style.display = 'inline';
        homePageUpload.style.display = 'inline';
    } else if (userScrollButton.classList.contains('checked')) {
        userScrollUpload.style.display = 'inline';
        homePageUpload.style.display = 'none';
    } else if (homePageButton.classList.contains('checked')) {
        userScrollUpload.style.display = 'none';
        homePageUpload.style.display = 'inline';
    }

    
    const selectedDays = document.getElementById('daysDisplay').textContent;
    const totalAmount = document.getElementById('total_display').textContent;
    const adsConfirmation = document.getElementById('adsConfirmation');
   
    adsConfirmation.textContent = `Your ads duration is ${selectedDays} with the total amount of ${totalAmount} upload photo to proceed with payment`;
}

function upload_asd_back(){
    const upload = document.getElementById("main"); 
    upload.style.display = "block";
    const upload2 = document.getElementById("main2"); 
    upload2.style.display = "none";
    
}


function checkNextButtonVisibility2() {
    const rangeInput = document.getElementById("daysRange"); 
    const selectedDays = parseInt(rangeInput.value);
    const nextButton = document.querySelector('.next_button2');
   

    if (selectedDays < 5) {
        nextButton.style.display = 'inline';
    } else {
        nextButton.style.display = 'none';
    }
}



    
var selectedImages = 0;

document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function() {
  
    var file = this.files[0];
    if (file) {
        if (selectedImages < 1) {
            if (file.type === 'image/jpeg' || file.type === 'image/png') {
                if (file.size <= 5242880) { // 5MB
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var image = document.createElement('img');
                        image.className = 'uploaded_image'; // Add unique class to the uploaded image
                        image.onload = function() {
                            if (image.naturalWidth >= 800 && image.naturalHeight >= 250) {
                                var aspectRatio = image.naturalWidth / image.naturalHeight;
                                    if (image.naturalWidth > 200 || image.naturalHeight > 200) {
                                        var aspectRatio = image.naturalWidth / image.naturalHeight;
                                        if (image.naturalWidth > image.naturalHeight) {
                                            image.width = 100;
                                            image.height = 100 / aspectRatio;
                                        } else {
                                            image.height = 100;
                                            image.width = 100 * aspectRatio;
                                        }
                                    }
                                  
                                    var frame = document.querySelector('.frame');
                                    if (frame) {
                                        frame.innerHTML = '';
                                        frame.appendChild(image);
                                        frame.style.display = 'flex';
                                        
                                        var closeButton = document.createElement('span');
                                        closeButton.innerHTML = '×';
                                        closeButton.className = 'close_button';
                                        closeButton.addEventListener('click', function() {
                                            frame.innerHTML = '';
                                            frame.style.display = 'none';
                                            selectedImages--;
                                            if (selectedImages === 0) {
                                                document.querySelector('.frame_container').style.display = 'none';
                                            }
                                        });
                                        frame.appendChild(closeButton);
                                        selectedImages++;
                                    }
                                
                
                            } else {
                                  //Please upload images of 800px * 250px  or above.
                                  document.querySelector('.frame_container2').style.display = 'none';
                                  var myModal = new bootstrap.Modal(document.getElementById('ads_upload_condition1'));
                                  myModal.show();
                                document.querySelector('.frame_container').style.display = 'none';
                            }
                        };
                        image.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    document.querySelector('.frame_container').style.display = 'flex';
                   
                } else {
                    //Size must be less than 5MB
                  
                    var myModal = new bootstrap.Modal(document.getElementById('ads_upload_condition2'));
                    myModal.show();
                }
            } else {
                  //Image must be PNG or JPG
               
                  var myModal = new bootstrap.Modal(document.getElementById('ads_upload_condition3'));
                  myModal.show();
            }
        } else {
            //You can only upload one image
          
            var myModal = new bootstrap.Modal(document.getElementById('ads_upload_condition4'));
            myModal.show();
        }
    }
});




var selectedImages2 = 0;

document.getElementById('uploadButton2').addEventListener('click', function() {
    document.getElementById('fileInput2').click();
});

document.getElementById('fileInput2').addEventListener('change', function() {
  
    var file = this.files[0];
    if (file) {
        if (selectedImages2 < 1) {
            if (file.type === 'image/jpeg' || file.type === 'image/png') {
                if (file.size <= 5242880) { // 5MB
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var image = document.createElement('img');
                        image.className = 'uploaded_image'; // Add unique class to the uploaded image
                        image.onload = function() {
                            if (image.naturalWidth >= 800 && image.naturalHeight >= 250) {
                                var aspectRatio = image.naturalWidth / image.naturalHeight;
                                    if (image.naturalWidth > 200 || image.naturalHeight > 200) {
                                        var aspectRatio = image.naturalWidth / image.naturalHeight;
                                        if (image.naturalWidth > image.naturalHeight) {
                                            image.width = 100;
                                            image.height = 100 / aspectRatio;
                                        } else {
                                            image.height = 100;
                                            image.width = 100 * aspectRatio;
                                        }
                                    }
                                  
                                    var frame = document.querySelector('.frame2');
                                    if (frame) {
                                        frame.innerHTML = '';
                                        frame.appendChild(image);
                                        frame.style.display = 'flex';
                                        
                                        var closeButton = document.createElement('span');
                                        closeButton.innerHTML = '×';
                                        closeButton.className = 'close_button2';
                                        closeButton.addEventListener('click', function() {
                                            frame.innerHTML = '';
                                            frame.style.display = 'none';
                                            selectedImages2--;
                                            if (selectedImages2 === 0) {
                                                document.querySelector('.frame_container2').style.display = 'none';
                                            }
                                        });
                                        frame.appendChild(closeButton);
                                        selectedImages2++;
                                    }
                                
                
                            } else {
                                //Please upload images of 800px * 250px  or above.
                                document.querySelector('.frame_container2').style.display = 'none';
                                var myModal = new bootstrap.Modal(document.getElementById('ads_upload_condition1'));
                                myModal.show();
                            }
                        };
                        image.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    document.querySelector('.frame_container2').style.display = 'flex';
                   
                } else {
                    //Size must be less than 5MB
                  
                    var myModal = new bootstrap.Modal(document.getElementById('ads_upload_condition2'));
                    myModal.show();
                }
            } else {
                //Image must be PNG or JPG
               
                var myModal = new bootstrap.Modal(document.getElementById('ads_upload_condition3'));
                myModal.show();
            }
        } else {
            //You can only upload one image
          
            var myModal = new bootstrap.Modal(document.getElementById('ads_upload_condition4'));
            myModal.show();
        }
    }
});

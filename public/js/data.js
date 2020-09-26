
var html;
var schedule_header;
var schedule_content;
var banner_custom;
var partners;

$(window).on("load", function () {
    loadEvents();
    // getPartners();
});


function loadEvents() {
    $.ajax(baseApi + 'events',
        {
            dataType: 'json', // type of response data
            timeout: 2000,     // timeout milliseconds
            success: function (data, status, xhr) {   // success callback function
                // $('p').append(data.firstName + ' ' + data.middleName + ' ' + data.lastName);
                // console.log('API_RESPONSE', data);
                html = '';
                showEventsRandom(data);
                showSchedule(data);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback
                // $('p').append('Error: ' + errorMessage);
                // console.log(textStatus + ' ' + jqXhr + ' ' + errorMessage);
            }
        });
}


function showEventsRandom(data) {
    $(".banner-carousel").empty();
    $(".banner_custom_detail").empty();
    // $.each(data, function(index, value) {
    //     console.log(index, value);
    //     var randomModel = Math.floor(Math.random() * 3) + 1;
    //     if(randomModel === 1){useModel1(value)}
    //     if(randomModel === 2){useModel1(value)}
    //     if(randomModel === 3){useModel3(value)}
    //     if(randomModel === 4){userModel4(value);}
    // });

    useModel1(data[data.length - 1]);
    // useModel1(data[0]);

    $(".banner-carousel").html(html);
    $(".banner_custom_detail").html(banner_custom);
}


function useModel1(value) {

    // banner with video
    html += '<div class="banner-slide">\n' +
        '                    <div class="container">\n' +
        '                        <h2 class="bn-hd wow fadeInDown" data-wow-duration="100ms"><span>' + value.name + '</span></h2>\n' +
        '                        <h1 class="ben-head wow fadeInUp" data-wow-duration="300ms"> ' + value.uid + '</h1>\n' +
        '                        <ul class="bn-links">\n' +
        '                            <li><a href="#" title="" event_id="' + value.id + '" class="active">RESERVER <i class="fa fa-arrow-circle-right"></i></a></li>\n' +
        '                            <li><a href="#" title="">Regarder la Video</a></li>\n' +
        '                        </ul>\n' +
        '                    </div>\n' +
        '                   <div class="cmp-img banner_custom">\n' +
        '                </div>';

    banner_custom += '<li class="col-lg-3 col-md-6 col-sm-6">\n' +
        '                            <span><i class="fa fa-calendar"></i></span>\n' +
        '                            <div class="con-info">\n' +
        '                                <h4>Date</h4>\n' +
        '                                <span>'+ new Date(value.event_date).toLocaleDateString("en-GB") + '</span>\n' +
        '                            </div><!--con-info end-->\n' +
        '                        </li>\n' +
        '                        <li class="col-lg-4 col-md-6 col-sm-6">\n' +
        '                            <span><i class="fa fa-map-marker"></i></span>\n' +
        '                            <div class="con-info">\n' +
        '                                <h4>Adresse</h4>\n' +
        '                                <span>' + value.address +'</span>\n' +
        '                            </div><!--con-info end-->\n' +
        '                        </li>\n' +
        '                        <li class="col-lg-2 col-md-6 col-sm-6">\n' +
        '                            <span><i class="fa fa-group"></i></span>\n' +
        '                            <div class="con-info">\n' +
        '                                <h4>Restant</h4>\n' +
        '                                <span>' + value.ticket_qty + ' tickets </span>\n' +
        '                            </div><!--con-info end-->\n' +
        '                        </li>\n' +
        '                        <li class="col-lg-2 col-md-6 col-sm-6">\n' +
        '                            <span><i class="fa fa-dollar"></i></span>\n' +
        '                            <div class="con-info">\n' +
        '                                <h4>Prix</h4>\n' +
        '                                <span>' + value.regular_price + ' ' + value.currency + '</span>\n' +
        '                            </div><!--con-info end-->\n' +
        '                        </li>';

    // $(".banner-section").css('background-image', 'url(' + baseImagePath + value.image_path + ')');

    // console.log("HTML_END", html);

}

function useModel2(value) {
    // banner with registration
    html += '<div class="banner-slide">\n' +
        '                    <div class="container">\n' +
        '                        <div class="row">\n' +
        '                            <div class="col-lg-4 col-md-5">\n' +
        '                                <div class="reg-form">\n' +
        '                                    <div class="sec-title">\n' +
        '                                        <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>\n' +
        '                                        <h3 class="wow fadeInRight" data-wow-duration="500ms">Event Register</h3>\n' +
        '                                    </div><!--sec-title end-->\n' +
        '                                    <form>\n' +
        '                                        <div class="form-field">\n' +
        '                                            <input type="text" name="name" placeholder="Name and Surname">\n' +
        '                                        </div><!--form-field end-->\n' +
        '                                        <div class="form-field">\n' +
        '                                            <input type="email" name="email" placeholder="Your Mail Here">\n' +
        '                                        </div><!--form-field end-->\n' +
        '                                        <div class="form-field">\n' +
        '                                            <input type="text" name="number" placeholder="Your Phone Number">\n' +
        '                                        </div><!--form-field end-->\n' +
        '                                        <div class="form-field">\n' +
        '                                            <div class="drop-menu">\n' +
        '                                                <div class="select">\n' +
        '                                                    <span>Select Your Price Tab</span>\n' +
        '                                                    <i class="fa fa-caret-down"></i>\n' +
        '                                                </div>\n' +
        '                                                <input type="hidden" name="gender">\n' +
        '                                                <ul class="dropeddown">\n' +
        '                                                    <li>300$</li>\n' +
        '                                                    <li>400$</li>\n' +
        '                                                    <li>500$</li>\n' +
        '                                                    <li>200$</li>\n' +
        '                                                    <li>600$</li>\n' +
        '                                                </ul>\n' +
        '                                            </div>\n' +
        '                                        </div>\n' +
        '                                        <div class="form-field">\n' +
        '                                            <button type="submit" event_id="' + value.id + '" class="btn-default">Register Now <i class="fa fa-arrow-circle-right"></i></button>\n' +
        '                                        </div>\n' +
        '                                    </form>\n' +
        '                                </div><!--reg-form end-->\n' +
        '                            </div>\n' +
        '                            <div class="col-lg-8 col-md-7">\n' +
        '                                <div class="banner-txt">\n' +
        '                                    <h2 class="bn-hd"><span>' + value.name + '</span></h2>\n' +
        '                                    <h1 class="ben-head"> ' + value.uid + '</h1>\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                        </div> \n' +
        '                    </div>\n' +
        '                </div>';
}

function useModel3(value) {
    //baner with video
    html += '<div class="banner-slide">\n' +
        '                    <div class="container">\n' +
        '                        <h2 class="bn-hd wow fadeInDown" data-wow-duration="100ms"><span>JANuary 17-19, 2014</span></h2>\n' +
        '                        <h1 class="ben-head wow fadeInUp" data-wow-duration="300ms">PHP Conference ın ıstanbul</h1>\n' +
        '                        <a href="https://www.youtube.com/watch?v=Y6MlVop80y0" title="" class="play-btn html5lightbox"><i class="fa fa-play"></i></a>\n' +
        '                    </div>\n' +
        '                </div>';

}


function userModel4(value) {

    //Banner with timer
    html += '<div class="banner-slide">\n' +
        '                    <div class="container">\n' +
        '                        <h2 class="bn-hd wow fadeInDown" data-wow-duration="100ms"><span>' + value.name + '</span></h2>\n' +
        '                        <h1 class="ben-head wow fadeInUp" data-wow-duration="300ms">' + value.uid + '</h1>\n' +
        '                        <div class="event-time-counter" id="clockdiv">\n' +
        '                            <ul>\n' +
        '                                <li>\n' +
        '                                    <h2 class="days"></h2>\n' +
        '                                    <span>Days</span>\n' +
        '                                </li>\n' +
        '                                <li>\n' +
        '                                    <h2 class="hours"></h2>\n' +
        '                                    <span>Hours</span>\n' +
        '                                </li>\n' +
        '                                <li>\n' +
        '                                    <h2 class="minutes"></h2>\n' +
        '                                    <span>Minutes</span>\n' +
        '                                </li>\n' +
        '                                <li>\n' +
        '                                    <h2 class="seconds"></h2>\n' +
        '                                    <span>Seconds</span>\n' +
        '                                </li>\n' +
        '                            </ul>\n' +
        '                        </div>\n' +
        '                        <a href="#" title="" event_id="' + value.id + '" class="btn-default">Register Now <i class="fa fa-arrow-circle-right"></i></a>\n' +
        '                    </div>\n' +
        '                </div>';

}


function showSchedule(data) {
    $(".schedule_tabs").empty();
    $("#myTabContent").empty();
    var header = '';
    var list = '';

    $.each(data, function (index, value) {

        var css_link = '';
        var css_div = '';
        var button = '';

        if (index === 0) {
            css_link = 'active';
            css_div = 'active show';
        }

        if(value.status === 1){
            button = '<a href="#" title="" event_id="' + value.id + '" class="btn-default">Réserver maintenant <i class="fa fa-arrow-circle-right"></i></a>';
        }

        header += '<li class="nav-item">\n' +
            '                            <a class="nav-link ' + css_link + '" id="confery-tab' + value.id + '" data-toggle="tab" href="#confery' + value.id + '" role="tab"\n' +
            '                               aria-controls="confery' + value.id + '" aria-selected="true">\n' +
            '                                <!--<strong>' + value.name + '</strong> --> \n' +
            '                                ' + getDateInFrench(value.event_date, true) + '\n' +
            '                            </a>\n' +
            '                        </li>';

        list += '<div class="tab-pane fade ' + css_div + '" id="confery' + value.id + '" role="tabpanel" aria-labelledby="confery-tab' + value.id + '">\n' +
            // '                        <ul class="nav nav-tabs" id="myTab' + value.id +'" role="tablist">\n' +
            // '                            <li class="nav-item">\n' +
            // '                                <a class="nav-link active" id="cf-tab1" data-toggle="tab" href="#confy1" role="tab"\n' +
            // '                                   aria-controls="confy1" aria-selected="true">HAll A</a>\n' +
            // '                            </li>\n' +
            // '                        </ul><!--tabs-list end-->\n' +
            '                        <div class="tab-content" id="myTabContent' + value.id + '">\n' +
            '\n' +
            '                            <div class="tab-pane fade active show" id="confy' + value.id + '" role="tabpanel" aria-labelledby="cf-tab' + value.id + '">\n' +
            '                                <div class="confy-cmpt-details">\n' +
            '                                    <ul>\n' +
            '                                        <li>\n' +
            '                                            <div class="cmpt-details wow fadeInUp" data-wow-duration="100ms">\n' +
            '                                                <div class="cmp-img">\n' +
            '                                                    <img src="' + baseImagePath + value.image_path + '" alt="">\n' +
            '                                                </div><!--cmp-img end-->\n' +
            '                                                <div class="cmp-info">\n' +
            '                                                    <div class="cmp-head">\n' +
            '                                                        <span><i class="fa fa-clock-o"></i>' + getDateInFrench(value.event_date, false) + '</span>\n' +
            '                                                        <h3>' + value.name + ' - ' + value.uid + '</h3>\n' +
            '                                                        <a class="share-btn" href="#" title=""><i\n' +
            '                                                                    class="fa fa-share-alt"></i></a>\n' +
            '                                                    </div>\n' +
            '                                                    <p> '+ value.description + '</p> '+ button + ' <hr/> \n' +
            '                                                    <div class="us-details">\n' +
            '                                                        <h3><i class="fa fa-map-marker"></i> ' + value.address +
            '                                                            <small></small>\n' +
            '                                                        </h3>\n' +
            '                                                        <ul>\n' +
            '                                                            <li><a href="#" title=""><i class="fa fa-facebook"></i></a>\n' +
            '                                                            </li>\n' +
            // '                                                            <li><a href="#" title=""><i class="fa fa-twitter"></i></a>\n' +
            // '                                                            </li>\n' +
            // '                                                            <li><a href="#" title=""><i class="fa fa-linkedin"></i></a>\n' +
            // '                                                            </li>\n' +
            '                                                            <li><a href="#" title=""><i class="fa fa-instagram"></i></a>\n' +
            '                                                            </li>\n' +
            '                                                        </ul>\n' +
            '                                                    </div><!--us-details end-->\n' +
            '                                                </div><!--cmp-info end-->\n' +
            '                                            </div><!--cmpt-details end-->\n' +
            '                                        </li>\n' +
            '                                    </ul>\n' +
            '                                </div><!--confy-cmpt-details end-->\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                    </div>';
    });

    // console.log("LIST", list);
    $(".schedule_tabs").html(header);
    $("#myTabContent").html(list);
}


function getPartners(){
    $.ajax(baseApi + 'partners',
        {
            dataType: 'json', // type of response data
            timeout: 2000,     // timeout milliseconds
            success: function (data, status, xhr) {   // success callback function
                console.log('API_RESPONSE', data);
                showParteners(data);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback
                console.log(textStatus + ' ' + jqXhr + ' ' + errorMessage);
            }
        });
}

function showParteners(data) {
    $(".partner-carousel").empty();
    partners = '';
    $.each(data, function(index, value) {
        console.log(index, value);
        partners += '<li><a href="'+  value.website_url + '" title=""><img src="'+ baseImagePath + value.image_path +'" alt="" width="47px" height="47px"></a></li>';
    });

    console.log("PARTNERS", partners);
    $(".partner-carousel").html(partners);
}


function getDateInFrench(string, short) {
    // new moment();
    var date  = moment(string, 'YYYY-MM-DD HH:mm:ss');
    date.locale('fr');

    if(short){
        return date.format('lll');
    }else{
        return date.format('LLLL');
    }


    // const months = [
    //     'Janvier',
    //     'Février',
    //     'Mars',
    //     'Avril',
    //     'Mai',
    //     'Juin',
    //     'Juillet',
    //     'Aout',
    //     'Septembre',
    //     'Octobre',
    //     'Novembre',
    //     'Decembre'
    // ];
    //
    // const days = [
    //     'Dimanche',
    //     'Lundi',
    //     'Mardi',
    //     'Mercredi',
    //     'Jeudi',
    //     'Vendredi',
    //     'Samedi'
    // ];
    //
    //
    // return days[d.getDay()]+ ' ' + d.getDay() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
}


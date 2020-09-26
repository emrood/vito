<!DOCTYPE html>
@php setlocale(LC_ALL, 'fr_FR'); @endphp
<html lang="fr"  xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vitoo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('js/lib/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('js/lib/slick/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/light-color.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}" />

    <link rel="alternate stylesheet " type="text/css"  href="{{ asset('css/colors/colour1.css') }}"  title="colour1" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour2.css') }}"  title="colour2" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour3.css') }}" title="colour3" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour4.css') }}" title="colour4" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour5.css') }}" title="colour5" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour6.css') }}" title="colour6" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour7.css') }}" title="colour7" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour8.css') }}" title="colour8" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour9.css') }}" title="colour9" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour10.css') }}" title="colour10" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour11.css') }}" title="colour11" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour12.css') }}" title="colour12" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour13.css') }}" title="colour13" />
    <link rel="alternate stylesheet " type="text/css" href="{{ asset('css/colors/colour14.css') }}" title="colour14" />
    {{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body class="light-vz">

<!-- Preloader -->

<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div><!--preloader end-->


<div class="theme-layout">

    <header>
        <div class="container">
            <div class="header-content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-10">
                        <div class="logo">
                            <div class="sec-title">
                                <span class="icon-inner wow fadeInRight" data-wow-duration="500ms">
                                    <span class="fa-stack"><img src="{{ asset('images/vito_bg_crop.png') }}" width="125px" height="65px"/></span>
                                </span>
                                {{--<h3 class="wow fadeInRight" data-wow-duration="500ms">im Event</h3>--}}
                            </div><!--sec-title end-->
                        </div><!--logo end-->
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-6 col-2">
                        <nav>
                            <ul>
                                <li><a href="#home" data-scroll-nav="0" title="">Acceuil</a></li>
                                <li><a href="#about" data-scroll-nav="1" title="">A propos</a></li>
                                <li><a href="#schedule" data-scroll-nav="2" title="">Programmation</a></li>
                                <li><a href="#sponsor" data-scroll-nav="3" title="">Partenaires</a></li>
                                <!--                                <li><a href="#speakers" data-scroll-nav="4" title="">Speakers</a></li>-->
                                <li><a href="#price" data-scroll-nav="5" title="">Tarifs</a></li>
                                <li><a href="{{ asset('app/') }}" title=""><i class="fa fa-lock" style="display: inline-block;"></i> Login</a></li>
                            </ul>
                        </nav>
                        <div class="menu-btn">
                            <span class="bar1"></span>
                            <span class="bar2"></span>
                            <span class="bar3"></span>
                        </div><!--menu-btn end-->
                    </div>
                </div>
            </div><!--header-content end-->
        </div>
    </header><!--header end-->


    <div class="responsive-mobile-menu">
        <ul>
            <li><a href="#home" data-scroll-nav="0" title="">Acceuil</a></li>
            <li><a href="#about" data-scroll-nav="1" title="">A propos</a></li>
            <li><a href="#schedule" data-scroll-nav="2" title="">Programmation</a></li>
            <li><a href="#sponsor" data-scroll-nav="3" title="">Partenaires</a></li>
            <li><a href="#price" data-scroll-nav="5" title="">Tarifs</a></li>
            <li><a href="{{ asset('app/') }}" title=""><i class="fa fa-lock" style="display: inline-block;"></i> Login</a></li>
        </ul>
    </div><!--responsive-mobile-menu end-->

    @if(count($events))
    @php $event = $events->get(0); @endphp
    <section class="banner-section" id="home" data-scroll-index="0">
        <div class="banner-carousel">
            <div class="banner-slide">
                <div class="container">
                    <h2 class="bn-hd wow fadeInDown" data-wow-duration="100ms"><span>{{ $event->name }}</span></h2>
                    <h1 class="ben-head wow fadeInUp" data-wow-duration="300ms">{{ $event->uid }}</h1>
                    <div class="event-time-counter" id="clockdiv" event-date="{{ $event->event_date }}">
                        <ul>
                            <li>
                                <h2 class="days"></h2>
                                <span>Jours</span>
                            </li>
                            <li>
                                <h2 class="hours"></h2>
                                <span>Heures</span>
                            </li>
                            <li>
                                <h2 class="minutes"></h2>
                                <span>Minutes</span>
                            </li>
                            <li>
                                <h2 class="seconds"></h2>
                                <span>Secondes</span>
                            </li>
                        </ul>
                    </div>
                    <a href="#" title="" class="btn-default" onclick="showError('Cette option sera disponible bientot')">S'enregistrer <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!--banner-slide end-->
            <div class="banner-slide">
                <div class="container">
                    <h2 class="bn-hd wow fadeInDown" data-wow-duration="100ms"><span>{{ strftime("%e %B %Y", strtotime($event->event_date)) }}</span></h2>
                    <h1 class="ben-head wow fadeInUp" data-wow-duration="300ms">{{ $event->name }}</h1>
                    <ul class="bn-links">
                        {{--<li><a href="#" title="" class="active">Register <i class="fa fa-arrow-circle-right"></i></a></li>--}}
                        <li><a href="#" title="">Regarder la video</a></li>
                    </ul>
                </div>
            </div><!--banner-slide end-->
            <div class="banner-slide">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="reg-form">
                                <div class="sec-title">
                                    <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
                                    <h3 class="wow fadeInRight" data-wow-duration="500ms">Réservation</h3>
                                </div><!--sec-title end-->
                                <form>
                                    <div class="form-field">
                                        <input type="text" name="name" placeholder="Nom complet">
                                    </div><!--form-field end-->
                                    <div class="form-field">
                                        <input type="email" name="email" placeholder="E-mail">
                                    </div><!--form-field end-->
                                    <div class="form-field">
                                        <input type="text" name="number" placeholder="Numero de téléphone">
                                    </div><!--form-field end-->
                                    {{--<div class="form-field">--}}
                                        {{--<div class="drop-menu">--}}
                                            {{--<div class="select">--}}
                                                {{--<span>Select Your Price Tab</span>--}}
                                                {{--<i class="fa fa-caret-down"></i>--}}
                                            {{--</div>--}}
                                            {{--<input type="hidden" name="gender">--}}
                                            {{--<ul class="dropeddown">--}}
                                                {{--<li>300$</li>--}}
                                                {{--<li>400$</li>--}}
                                                {{--<li>500$</li>--}}
                                                {{--<li>200$</li>--}}
                                                {{--<li>600$</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="form-field">
                                        <button type="button" class="btn-default" onclick="showError('Cette option sera disponible bientot')">Réservez maintenant <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </form>
                            </div><!--reg-form end-->
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="banner-txt">
                                <h2 class="bn-hd"><span>{{ strftime("%e %B %Y", strtotime($event->event_date))  }}</span></h2>
                                <h1 class="ben-head">{{ $event->name.' '.$event->uid }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--banner-slide end-->
        </div><!--banner-carousel end-->
        <div class="container">
            <div class="contact-info-details">
                <div class="container">
                    <ul class="row">
                        <li class="col-lg-3 col-md-6 col-sm-6">
                            <span><i class="fa fa-calendar"></i></span>
                            <div class="con-info">
                                <h4>Date</h4>
                                <span>{{ strftime("%d/%m/%Y", strtotime($event->event_date)) }}</span>
                            </div><!--con-info end-->
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-6">
                            <span><i class="fa fa-map-marker"></i></span>
                            <div class="con-info">
                                <h4>Adresse</h4>
                                <span>{{ $event->address }}</span>
                            </div><!--con-info end-->
                        </li>
                        <li class="col-lg-2 col-md-6 col-sm-6">
                            <span><i class="fa fa-group"></i></span>
                            <div class="con-info">
                                <h4>Restant</h4>
                                <span>{{ $event->ticket_qty.' tickets' }}</span>
                            </div><!--con-info end-->
                        </li>
                        <li class="col-lg-3 col-md-6 col-sm-6">
                            <span><i class="fa fa-microphone"></i></span>
                            <div class="con-info">
                                <h4>Prix</h4>
                                <span>{{ $event->regular_price.' '.$event->currency }}</span>
                            </div><!--con-info end-->
                        </li>
                    </ul>
                </div>
            </div><!-- contact-info-details end-->
        </div>
    </section><!--banner-section end-->
    @endif
    <section class="about-sec sec-padding" id="about" data-scroll-index="1">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i
                                class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i class="fa fa-star fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Qui somme nous ?
                    <small>/ Vin aprann</small>
                </h3>
            </div><!--sec-title end-->
            <div class="about-sec-details">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="about-info">
                            <p class="wow fadeInUp" data-wow-duration="300ms">
                                Vitoo est une plateforme de gestion d'activité publique comprenant une gamme très chargée de services répondant a toute forme de contrôle stricte et sécuritaire de vos évènements.
                                <br/>
                                Notre application vous offre la possibilité de savoir à tout moment l’importance démographique qui occupe votre espace, la gestion de votre stock et vous met à l’abri de toute forme de fraude.

                            </p>
                            <p class="wow fadeInUp" data-wow-duration="500ms">
                                Notre technologie préserve de la duplication des tickets, des entrées multiples, de dérive sécuritaire ainsi que des problèmes liés au contrôle des stocks de produits mis en vente lors de la réalisation de vos activités.
                                <br/>
                                Notre technique répond à toute formes d’évènement qu’elle soit culturel (Fêtes, bals, festivals, salons, expositions, événement sportif…), professionnel (conférence, congrès) et vous apporte la paix d’esprit dont vous méritez.

                            </p>
                            <ul class="bn-links">
                                {{--<li><a href="#" title="" class="active wow flipInY" data-wow-duration="200ms">S'inscrir<i class="fa fa-arrow-circle-right"></i></a></li>--}}
                                <li><a href="#" title="" class="wow flipInY" data-wow-duration="400ms">Voir plus</a>
                                </li>
                            </ul>
                        </div><!--about-info end-->
                    </div>
                    <div class="col-lg-4">
                        <div class="abt-imgs">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="abt-img wow fadeInLeft" data-wow-duration="100ms">
                                        <img src="images/ticket_with_qr.jpg" alt="">
                                        <a href="images/ticket_with_qr.jpg" title="" class="html5lightbox"><i
                                                    class="fa fa-search"></i></a>
                                    </div><!--abt-img end-->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="abt-img wow fadeInDown" data-wow-duration="200ms">
                                        <img src="images/scan_ticket.jpg" alt="">
                                        <a href="images/scan_ticket.jpg" title="" class="html5lightbox"><i
                                                    class="fa fa-search"></i></a>
                                    </div><!--abt-img end-->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="abt-img wow fadeInRight" data-wow-duration="300ms">
                                        <img src="images/qr_security.jpg" alt="">
                                        <a href="images/qr_security.jpg" title="" class="html5lightbox"><i
                                                    class="fa fa-search"></i></a>
                                    </div><!--abt-img end-->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="abt-img wow fadeInUp" data-wow-duration="400ms">
                                        <img src="images/security.jpg" alt="">
                                        <a href="images/security.jpg" title="" class="html5lightbox"><i
                                                    class="fa fa-search"></i></a>
                                    </div><!--abt-img end-->
                                </div>
                            </div>
                        </div><!--abt-imgs end-->
                    </div>
                </div>
            </div><!-- about-sec-details end-->
        </div>
    </section><!--about-sec end-->

    @if(count($events))
    <section class="conference-sec" id="schedule" data-scroll-index="2">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i class="fa fa-microphone fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Événement programmé
                    <small>/ N'oubliez pas</small>
                </h3>
                <a href="#" title="" class="wow flipInY" data-wow-duration="300ms"><i class="fa fa-print"></i>Télécharger la programation</a>
            </div><!--sec-title end-->
            <div class="conference-tabs-sec wow fadeIn" data-wow-duration="200ms">
                <div class="conf-tab-list">
                    <ul class="nav nav-tabs wow fadeInUp" data-wow-delay=".2s" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="confery-tab1" data-toggle="tab" href="#confery1" role="tab" aria-controls="confery1" aria-selected="true">
                                <strong>{{ strftime("%d/%m/%Y", strtotime($events->get(0)->event_date))  }}</strong>
                                {{ strftime("%I:%M %p", strtotime($events->get(0)->event_date))  }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="confery-tab2" data-toggle="tab" href="#confery2" role="tab" aria-controls="confery2" aria-selected="false">
                                <strong>{{ strftime("%d/%m/%Y", strtotime($events->get(1)->event_date))  }}</strong>
                                {{ strftime("%I:%M %p", strtotime($events->get(1)->event_date))  }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="confery-tab3" data-toggle="tab" href="#confery3" role="tab" aria-controls="confery3" aria-selected="false">
                                <strong>{{ strftime("%d/%m/%Y", strtotime($events->get(2)->event_date))  }}</strong>
                                {{ strftime("%I:%M %p", strtotime($events->get(2)->event_date))  }}
                            </a>
                        </li>
                        @if(count($events) > 3)
                        <li class="nav-item">
                            <a class="nav-link" id="confery-tab4" data-toggle="tab" href="#confery4" role="tab" aria-controls="confery4" aria-selected="false">
                                <strong class="onlyy">Autres dates</strong>
                            </a>
                        </li>
                        @endif
                    </ul><!--tabs-list end-->
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="confery1" role="tabpanel" aria-labelledby="confery-tab1">
                        @php $event = $events->get(0); @endphp
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="confy1" role="tabpanel" aria-labelledby="cf-tab1">
                                <div class="confy-cmpt-details">
                                    <ul>
                                        <li>
                                            <div class="cmpt-details wow fadeInUp" data-wow-duration="300ms">
                                                <div class="cmp-img">
                                                    <img src="{{ asset($event->image_path) }}" alt="">
                                                </div><!--cmp-img end-->
                                                <div class="cmp-info">
                                                    <div class="cmp-head">
                                                        <span><i class="fa fa-clock-o"></i>{{ strftime("%I:%M %p", strtotime($event->event_date))  }}</span>
                                                        <h3>{{ $event->name.' - '.$event->uid }}</h3>
                                                        <a class="share-btn" href="#" title=""><i class="fa fa-share-alt"></i></a>
                                                    </div>
                                                    <p>{{ $event->description  }}</p>
                                                    <hr/>
                                                    <a href="" title="" event_id="{{ $event->id }}" class="btn-default" onclick="showError('Cette fonction sera disponible tres prochainement')"> Acheter mon billet <i class="fa fa-arrow-circle-right"></i></a>
                                                    <br/>
                                                    <hr/>
                                                    <div class="us-details">
                                                        <h3> {{ $event->regular_price.' '.$event->currency }} <small>/ <i class="fa fa-map-marker"></i> {{ $event->address }} </small></h3>
                                                        <ul>
                                                            <li><a href="{{ $event->facebook_url }}" title=""><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="{{ $event->instagram_url }}" title=""><i class="fa fa-instagram"></i></a></li>
                                                        </ul>
                                                    </div><!--us-details end-->
                                                </div><!--cmp-info end-->
                                            </div><!--cmpt-details end-->
                                        </li>
                                    </ul>
                                </div><!--confy-cmpt-details end-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="confery2" role="tabpanel" aria-labelledby="confery-tab2">
                        @php $event = $events->get(1); @endphp
                        <div class="tab-content" id="myTabContent3">
                            <div class="tab-pane fade show active" id="cconfy1" role="tabpanel" aria-labelledby="ccf-tab1">
                                <div class="confy-cmpt-details">
                                    <ul>
                                        <li>
                                            <div class="cmpt-details wow fadeInUp" data-wow-duration="100ms">
                                                <div class="cmp-img">
                                                    <img src="{{ asset($event->image_path) }}" alt="">
                                                </div><!--cmp-img end-->
                                                <div class="cmp-info">
                                                    <div class="cmp-head">
                                                        <span><i class="fa fa-clock-o"></i>{{ strftime("%I:%M %p", strtotime($event->event_date))  }}</span>
                                                        <h3>{{ $event->name.' - '.$event->uid }}</h3>
                                                        <a class="share-btn" href="#" title=""><i class="fa fa-share-alt"></i></a>
                                                    </div>
                                                    <p>{{ $event->description  }}</p>
                                                    <hr/>
                                                    <a href="" title="" event_id="{{ $event->id }}" class="btn-default" onclick="showError('Cette fonction sera disponible tres prochainement')"> Acheter mon billet <i class="fa fa-arrow-circle-right"></i></a>
                                                    <br/>
                                                    <hr/>
                                                    <div class="us-details">
                                                        <h3> {{ $event->regular_price.' '.$event->currency }} <small>/ <i class="fa fa-map-marker"></i> {{ $event->address }} </small></h3>
                                                        <ul>
                                                            <li><a href="{{ $event->facebook_url }}" title=""><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="{{ $event->instagram_url }}" title=""><i class="fa fa-instagram"></i></a></li>
                                                        </ul>
                                                    </div><!--us-details end-->
                                                </div><!--cmp-info end-->
                                            </div><!--cmpt-details end-->
                                        </li>
                                    </ul>
                                </div><!--confy-cmpt-details end-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="confery3" role="tabpanel" aria-labelledby="confery-tab3">
                        @php $event = $events->get(2); @endphp
                        <div class="tab-content" id="myTabContent4">
                            <div class="tab-pane fade show active" id="ccconfy1" role="tabpanel" aria-labelledby="ccconfy1">
                                <div class="confy-cmpt-details">
                                    <ul>
                                        <li>
                                            <div class="cmpt-details wow fadeInUp" data-wow-duration="100ms">
                                                <div class="cmp-img">
                                                    <img src="{{ asset($event->image_path) }}" alt="">
                                                </div><!--cmp-img end-->
                                                <div class="cmp-info">
                                                    <div class="cmp-head">
                                                        <span><i class="fa fa-clock-o"></i>{{ strftime("%I:%M %p", strtotime($event->event_date))  }}</span>
                                                        <h3>{{ $event->name.' - '.$event->uid }}</h3>
                                                        <a class="share-btn" href="#" title=""><i class="fa fa-share-alt"></i></a>
                                                    </div>
                                                    <p>{{ $event->description  }}</p>
                                                    <hr/>
                                                    <a href="" title="" event_id="{{ $event->id }}" class="btn-default" onclick="showError('Cette fonction sera disponible tres prochainement')">Acheter mon billet<i class="fa fa-arrow-circle-right"></i></a>
                                                    <br/>
                                                    <hr/>
                                                    <div class="us-details">
                                                        <h3> {{ $event->regular_price.' '.$event->currency }} <small>/ <i class="fa fa-map-marker"></i> {{ $event->address }} </small></h3>
                                                        <ul>
                                                            <li><a href="{{ $event->facebook_url }}" title=""><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="{{ $event->instagram_url }}" title=""><i class="fa fa-instagram"></i></a></li>
                                                        </ul>
                                                    </div><!--us-details end-->
                                                </div><!--cmp-info end-->
                                            </div><!--cmpt-details end-->
                                        </li>
                                    </ul>
                                </div><!--confy-cmpt-details end-->
                            </div>
                        </div>
                    </div>
                    @if(count($events) > 3)
                    @php $last_events = $events->skip(3)->take(7);@endphp
                    <div class="tab-pane fade" id="confery4" role="tabpanel" aria-labelledby="confery-tab4">
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="coonfy3" role="tabpanel" aria-labelledby="cof-tab3">
                                <div class="confy-cmpt-details">
                                    <ul>
                                        @foreach($last_events as $key => $last_event)
                                            <li>
                                                <div class="cmpt-details wow fadeInUp" data-wow-duration="{!! $key.'00ms' !!}">
                                                    <div class="cmp-img">
                                                        <img src="{{ asset($last_event->image_path) }}" alt="">
                                                    </div><!--cmp-img end-->
                                                    <div class="cmp-info">
                                                        <div class="cmp-head">
                                                            <span><i class="fa fa-clock-o"></i>{{ strftime("%d %B %Y %I:%M %p", strtotime($last_event->event_date))  }}</span>
                                                            <h3>{{ $last_event->name.' - '.$last_event->uid }}</h3>
                                                            <a class="share-btn" href="#" title=""><i class="fa fa-share-alt"></i></a>
                                                        </div>
                                                        <p>{{ $last_event->description  }}</p>
                                                        <hr/>
                                                        <a href="" title="" event_id="{{ $last_event->id }}" class="btn-default" onclick="showError('Cette fonction sera disponible tres prochainement')">Acheter mon billet<i class="fa fa-arrow-circle-right"></i></a>
                                                        <br/>
                                                        <hr/>
                                                        <div class="us-details">
                                                            <h3> {{ $last_event->regular_price.' '.$last_event->currency }} <small>/ <i class="fa fa-map-marker"></i> {{ $last_event->address }} </small></h3>
                                                            <ul>
                                                                <li><a href="{{ $last_event->facebook_url }}" title=""><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="{{ $last_event->instagram_url }}" title=""><i class="fa fa-instagram"></i></a></li>
                                                            </ul>
                                                        </div><!--us-details end-->
                                                    </div><!--cmp-info end-->
                                                </div><!--cmpt-details end-->
                                            </li>
                                        @endforeach
                                    </ul>
                                </div><!--confy-cmpt-details end-->
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div><!--conference-tabs-sec end-->
        </div>
    </section><!--conference-sec end-->
    @endif


    @if(count($partners))
    <section class="sec-padding" id="sponsor" data-scroll-index="3">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i
                                class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i
                                class="fa fa-thumbs-up fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Nos partenaires
                    <!--                    <small>/ dont forget it</small>-->
                </h3>
            </div><!--sec-title end-->
            <div class="partner-sec">
                <ul class="partner-carousel">
                    @foreach($partners as $partner)
                        <li><a href="#" title=""><img src="{{ asset($partner->image_path) }}" alt="" height="47px"></a></li>
                    @endforeach
                </ul><!--partner-carousel end-->
                <div class="spons-dv text-center">
                    <a href="#" title="" class="btn-default" onclick="showError('Disponible bientot !')"><i class="fa fa-thumbs-up"></i>Devenir partenaire</a>
                </div><!--spons-dv end-->
            </div><!--partner-sec end-->
        </div>
    </section><!--partner-sec end-->
    @endif
    <section class="sec-padding testimonial-sect">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i
                                class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i
                                class="fa fa-comments-o fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Témoignages
                    <small> / Voir ce que les gens disent de nous</small>
                </h3>
            </div><!--sec-title end-->
            <div class="testimonial-sec">
                <div class="comment-slide">
                    <div class="comment-para wow flipInY" data-wow-duration="300ms">
                        <p><< Bientot >></p>
                        <div class="commenter-name">
                            <span>par <a href="#" title="">Vitoo </a></span>
                        </div>
                    </div>
                    <div class="cmntr-img wow flipInY" data-wow-duration="300ms">
                        <div class="hex-deg">
                            <div class="hex-deg">
                                <div class="hex-deg">
                                    <div class="hex-inner">
                                        <img src="images/resources/vito_bg_black.jpg" alt="" width="100px" height="115px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--comment-slide end-->
                <div class="comment-slide">
                    <div class="comment-para wow flipInY" data-wow-duration="300ms">
                        <p><< Bientot >></p>
                        <div class="commenter-name">
                            <span>par <a href="#" title="">Vitoo </a></span>
                        </div>
                    </div>
                    <div class="cmntr-img wow flipInY" data-wow-duration="300ms">
                        <div class="hex-deg">
                            <div class="hex-deg">
                                <div class="hex-deg">
                                    <div class="hex-inner">
                                        <img src="images/resources/vito_bg_black.jpg" alt="" width="100px" height="115px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--comment-slide end-->
                <div class="comment-slide">
                    <div class="comment-para wow flipInY" data-wow-duration="300ms">
                        <p><< Bientot >></p>
                        <div class="commenter-name">
                            <span>par <a href="#" title="">Vitoo </a></span>
                        </div>
                    </div>
                    <div class="cmntr-img wow flipInY" data-wow-duration="300ms">
                        <div class="hex-deg">
                            <div class="hex-deg">
                                <div class="hex-deg">
                                    <div class="hex-inner">
                                        <img src="images/resources/vito_bg_black.jpg" alt="" width="100px" height="115px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--comment-slide end-->
            </div><!--testimonial-sec end-->
        </div>
    </section><!--sec-padding end-->

    <section class="team-sec sec-padding" id="speakers" data-scroll-index="4">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i class="fa fa-user fa-stack-1x"></i></span></span>
                <h3>L'équipe <small>/ meet with greaters</small></h3>
            </div><!--sec-title end-->
            <div class="team-sec-details">
                <div class="team-detail wow fadeInUp" data-wow-duration="100ms">
                    <div class="cmntr-img">
                        <div class="hex-deg">
                            <div class="hex-deg">
                                <div class="hex-deg">
                                    <div class="hex-inner">
                                        <img src="{{ asset('images/noel_emmanuel.jpg') }}" alt="" height="190px" width="170px">
                                        <a href="#" title="" class="ext-link"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--cmntr-img end-->
                    <div class="team-info">
                        <h3>Noel Emmanuel Roodly</h3>
                        <span>Co Founder</span>
                        <p>Développeur logiciel a Wyzdev</p>
                        <ul class="social-line list-inline text-center">
                            <li><a href="https://www.facebook.com/Emroody" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/emrood4" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="mailto:emmanuelroodly1@gmail.com" class="google" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/emmanuel-roodly-noel-76a704b6/" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.instagram.com/emroody/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div><!--team-info end-->
                </div><!-- Noel Emmanuel ROodly team-detail end-->
                <div class="team-detail wow fadeInUp" data-wow-duration="200ms">
                    <div class="cmntr-img">
                        <div class="hex-deg">
                            <div class="hex-deg">
                                <div class="hex-deg">
                                    <div class="hex-inner">
                                        <img src="{{ asset('images/audin_michel.jpg') }}" alt="" height="190px" width="170px">
                                        <a href="#" title="" class="ext-link"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--cmntr-img end-->
                    <div class="team-info">
                        <h3>Audin Michel Castor</h3>
                        <span>Co founder</span>
                        <p>Développeur logiciel a Wyzdev</p>
                        <ul class="social-line list-inline text-center">
                            <li><a href="https://www.facebook.com/audinmichel.castor" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            {{--<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>--}}
                            <li><a href="mailto:handycomeau@gmail.com" class="google"><i class="fa fa-google-plus" target="_blank"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/audin-michel-castor-2b990a117/" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            {{--<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>--}}
                        </ul>
                    </div><!--team-info end-->
                </div><!-- Castor team-detail end-->
                <div class="team-detail wow fadeInUp" data-wow-duration="300ms">
                    <div class="cmntr-img">
                        <div class="hex-deg">
                            <div class="hex-deg">
                                <div class="hex-deg">
                                    <div class="hex-inner">
                                        <img src="{{ asset('images/default.png') }}" alt="" height="190px" width="170px">
                                        <a href="#" title="" class="ext-link"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--cmntr-img end-->
                    <div class="team-info">
                        <h3>Elson</h3>
                        <span>Manager</span>
                        <p></p>
                        <ul class="social-line list-inline text-center">
                            {{--<li><a href="#" class="facebook"><i class="fa fa-facebook" target="_blank"></i></a></li>--}}
                            {{--<li><a href="#" class="twitter"><i class="fa fa-twitter" target="_blank"></i></a></li>--}}
                            {{--<li><a href="#" class="google"><i class="fa fa-google-plus" target="_blank"></i></a></li>--}}
                            {{--<li><a href="#" class="linkedin"><i class="fa fa-linkedin" target="_blank"></i></a></li>--}}
                            {{--<li><a href="#" class="instagram"><i class="fa fa-instagram" target="_blank"></i></a></li>--}}
                        </ul>
                    </div><!--team-info end-->
                </div><!-- Elson team-detail end-->
                {{--<div class="team-detail wow fadeInUp" data-wow-duration="400ms">--}}
                    {{--<div class="cmntr-img">--}}
                        {{--<div class="hex-deg">--}}
                            {{--<div class="hex-deg">--}}
                                {{--<div class="hex-deg">--}}
                                    {{--<div class="hex-inner">--}}
                                        {{--<img src="images/resources/team4.jpg" alt="">--}}
                                        {{--<a href="#" title="" class="ext-link"><i class="fa fa-link"></i></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div><!--cmntr-img end-->--}}
                    {{--<div class="team-info">--}}
                        {{--<h3>Speaker name here</h3>--}}
                        {{--<span>Co Founder</span>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed vel velit</p>--}}
                        {{--<ul class="social-line list-inline text-center">--}}
                            {{--<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>--}}
                            {{--<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>--}}
                            {{--<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>--}}
                            {{--<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>--}}
                            {{--<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>--}}
                        {{--</ul>--}}
                    {{--</div><!--team-info end-->--}}
                {{--</div><!--team-detail end-->--}}
            </div><!--team-sec-details end-->
            <div class="spons-dv text-center wow fadeInUp" data-wow-duration="300ms">
                {{--<a href="#" title="" class="btn-default"><i class="fa fa-user"></i> see all speakers</a>--}}
            </div><!--spons-dv end-->
        </div>
    </section><!--team-sec end-->

    <!-- EVENT FACS -->
    <section class="event-price-sec sec-padding" id="price" data-scroll-index="5">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i
                                class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i
                                class="fa fa-thumbs-up fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Nos tarifs
                    <small> / Prix parfait pour vos événments</small>
                </h3>
            </div><!--sec-title end-->
            <div class="price-sec-details">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="price text-center wow fadeInUp" data-wow-duration="100ms">
                            <h3 class="price-head">Basic</h3>
                            <!--                            <h2>1$<small>/QR</small>-->
                            <h2><small>1$/QR</small>
                            </h2>
                            <ul>
                                <li><i class="fa fa-check-circle-o text-success"></i>Génération de 1 à 1000 code QR</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Validation de code à l'entrée</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Compte personalisé Vitoo</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Dashboard de suivie en temps réel</li>
                                <li><i class="fa fa-times-circle-o text-danger"></i>Gestion du bar</li>
                                <li><i class="fa fa-times-circle-o text-danger"></i>Liste invité</li>
                                <li><i class="fa fa-times-circle-o text-danger"></i>Liste VIP</li>
                                <li><i class="fa fa-times-circle-o text-danger"></i>Génération de QR en backup</li>
                                <li><i class="fa fa-times-circle-o text-danger"></i>Cordon de sécurité</li>
                            </ul>
                            <a href="#" title="" class="btn-default">RESERVER</a>
                        </div><!--price end-->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="price active text-center wow fadeInUp" data-wow-duration="200ms">
                            <h3 class="price-head">Standard</h3>
                            <!--                            <h2>0.99$-->
                            <!--                                <small>/QR</small>-->
                            <!--                            </h2>-->
                            <h2>
                                <small>0.99$/QR</small>
                            </h2>
                            <ul>
                                <li><i class="fa fa-check-circle-o text-success"></i>Génération 1000 à 5000 code QR</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Validation de code à l'entrée</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Compte personalisé Vitoo</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Dashboard de suivie en temps réel</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Gestion du bar</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Liste invité</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Liste VIP</li>
                                <li><i class="fa fa-times-circle-o text-danger"></i>Génération de QR en backup</li>
                                <li><i class="fa fa-times-circle-o text-danger"></i>Cordon de sécurité</li>
                            </ul>
                            <a href="#" title="" class="btn-default">RESERVER</a>
                        </div><!--price end-->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="price text-center wow fadeInUp" data-wow-duration="300ms">
                            <h3 class="price-head">Premium</h3>
                            <!--                            <h2>0.89$-->
                            <!--                                <small>0.89$/QR</small>-->
                            <!--                            </h2>-->
                            <h2>
                                <small>0.89$/QR</small>
                            </h2>
                            <ul>
                                <li><i class="fa fa-check-circle-o text-success"></i>Génération de 5000+ code QR</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Validation de code à l'entrée</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Compte personalisé Vitoo</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Dashboard de suivie en temps réel</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Gestion du bar</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Liste invité</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Liste VIP</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Génération de QR en backup</li>
                                <li><i class="fa fa-check-circle-o text-success"></i>Cordon de sécurité</li>
                            </ul>
                            <a href="#" title="" class="btn-default">RESERVER</a>
                        </div><!--price end-->
                    </div>
                </div>
            </div><!--price-sec-details end-->
        </div>
    </section><!--event-price-sec end-->

    <section class="faqs-sec sec-padding">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i
                                class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i
                                class="fa fa-microphone fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Event FAQS
                    <small>/ Trouver les reponses</small>
                </h3>
                <!--                <a href="#" title=""><i class="fa fa-pencil"></i>open a tıcket</a>-->
            </div><!--sec-title end-->
            <div class="faqs-sec-details wow fadeInUp" data-wow-duration="300ms">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="nav nav-tabs wow fadeInUp" data-wow-delay=".2s" id="myTab6" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="ques-tab1" data-toggle="tab" href="#ques1" role="tab"
                                   aria-controls="ques1" aria-selected="true">Comment choisir la date de l'événement ?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ques-tab2" data-toggle="tab" href="#ques2" role="tab"
                                   aria-controls="ques2" aria-selected="false"> Comment créer un nouvel événement ? </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ques-tab3" data-toggle="tab" href="#ques3" role="tab"
                                   aria-controls="ques3" aria-selected="false"> Comment fixer le prix ? </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="ques-tab4" data-toggle="tab" href="#ques4" role="tab"
                                   aria-controls="ques4" aria-selected="false"> How to Delete Old Events ? </a>
                            </li> -->
                        </ul><!--tabs-list end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="tab-content" id="myTabContent6">
                            <div class="tab-pane fade show active" id="ques1" role="tabpanel"
                                 aria-labelledby="ques-tab1">
                                <div class="ques-details">
                                    <p>Quels sont les meilleures dates pour tenir des évènements ? Une bonne question à laquelle nous allons nous efforcer de répondre au fil de cet article.
                                        <br/>
                                        Le choix de date de certains évènements pourrait sembler évident : anniversaires, commémorations, noël, pâques, le nouvel an… mais tous les évènements ne sont pas aussi simples à situer.
                                        <br/>
                                        Alors, comment choisir la bonne date pour votre évènement ?
                                        <br/>
                                        Vous avez le choix entre 365 jours, il peut donc être légitimement intimidant de se retrouver confronté à ce choix. Utilisons la méthode de l’exclusion pour simplifier un peu le processus.
                                        <br/>
                                        Ce guide se focalisera sur la façon de choisir une date pour un évènement, et vous aidera à prendre en compte :. </p>
                                    <ul>
                                        <li><i class="fa fa-check-circle-o"></i> Votre public</li>
                                        <li><i class="fa fa-check-circle-o"></i> Le travail qui doit être effectué</li>
                                        <li><i class="fa fa-check-circle-o"></i> Les jours de congés populaires</li>
                                        <li><i class="fa fa-check-circle-o"></i> Les dates d’évènements concurrents</li>
                                        <li><i class="fa fa-check-circle-o"></i> Les disponibilités des sites et fournisseurs</li>
                                        <li><i class="fa fa-check-circle-o"></i> Les disponibilités des orateurs et animateurs</li>
                                    </ul>
                                </div><!--ques-details end-->
                            </div>
                            <div class="tab-pane fade" id="ques2" role="tabpanel" aria-labelledby="ques-tab2">
                                <div class="ques-details">
                                    <p>Organisé dans un but lucratif ou tout simplement pour faire connaitre son association,
                                        un événement se veut convivial et festif , mais peut etre aussi informatif. Néanmoins,
                                        organiser une activité n’est pas une tâche aisée. <br/>En effet,
                                        il faut suivre plusieurs étapes essentielles pour son organisation : choix du lieu, communication, billetterie, définition du budget,
                                        recherche de financement… <br/><br/> En plus, il convient de respecter un certain nombre d’obligations légales comme la souscription à une assurance ou encore l’accomplissement d’une formalité déclarative auprès de l’autorité compétente.
                                        <br/>À cela s’ajoute la gestion des membres et des bénévoles de l’organisme associatif avant et pendant la manifestation.
                                        Aussi, pour garantir la réussite de votre événement, prenez en compte ces quelques points lors de vos préparatifs.. </p>
                                    <!-- <ul>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                    </ul> -->
                                </div><!--ques-details end-->
                            </div>
                            <div class="tab-pane fade" id="ques3" role="tabpanel" aria-labelledby="ques-tab3">
                                <div class="ques-details">
                                    <p>Un organisateur d’événement doit maîtriser une multitude de détails et prendre de nombreuses décisions importantes.
                                        Parmi ces dernières, le choix du prix des billets est crucial. <br/>
                                        Si le prix des billets est trop élevé, les participants n’accepteront pas de débourser la somme demandée et ne se rendront donc pas à votre événement.
                                        Au contraire, des billets vendus à un prix trop faible ne vous permettront pas d’engranger des recettes suffisantes pour couvrir toutes vos dépenses.
                                        Pire, un prix bas peut donner l’impression que votre événement n’est pas assez intéressant pour vos potentiels participants.. </p>
                                    <!-- https://weezevent.com/fr/blog/determiner-prix-evenement/ <ul>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                        <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                    </ul> -->
                                </div><!--ques-details end-->
                            </div>
                            <!-- <div class="tab-pane fade" id="ques4" role="tabpanel" aria-labelledby="ques-tab4">
                                 <div class="ques-details">
                                     <p>Vestibulum sit amet tincidunt urna, eget ullamcorper purus. Aenean feugiat quis
                                         tortor vitae fringilla. Pellentesque augue nisl, condimentum at sem et,
                                         fer-mentum varius ligula. Nulla dignissim nulla eget congue cursus. </p>
                                     <ul>
                                         <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                         <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                         <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                         <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                         <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                         <li><i class="fa fa-check-circle-o"></i> First Awesome Feature</li>
                                     </ul>
                                 </div> --> <!--ques-details end-->
                        </div>
                    </div><!--tab-content end-->
                </div>
            </div>
        </div><!-- faqs-sec-details end-->
</section><!--faqs-sec end-->

    {{--<section class="blog-sec sec-padding">--}}
        {{--<div class="container">--}}
            {{--<div class="sec-title">--}}
                {{--<span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-microphone fa-stack-1x"></i></span></span>--}}
                {{--<h3 class="wow fadeInRight" data-wow-duration="500ms">Recent Blog Posts <small>/ get news!</small></h3>--}}
            {{--</div><!--sec-title end-->--}}
            {{--<div class="blog-posts">--}}
                {{--<div class="row blog-carousel">--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="blog-post wow fadeInUp" data-wow-duration="100ms">--}}
                            {{--<div class="blog-img">--}}
                                {{--<img src="images/resources/blog1.jpg" alt="">--}}
                                {{--<span class="blog-type"><i class="fa fa-video-camera"></i></span>--}}
                            {{--</div><!--blog-img end-->--}}
                            {{--<div class="blog-info">--}}
                                {{--<h3><a href="#" title="">Standart Blog Post Header Here</a></h3>--}}
                                {{--<div class="posted-ot">--}}
                                    {{--<h4>Posted on 17th May 2014</h4>--}}
                                    {{--<span><i class="fa fa-comment"></i> 12</span>--}}
                                {{--</div>--}}
                                {{--<p>Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi tristiquetus et senectus et netus et malesuada ac turpis.</p>--}}
                                {{--<a href="#" title="" class="btn-default">read more</a>--}}
                            {{--</div><!--blog-info end-->--}}
                        {{--</div><!--blog-post end-->--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="blog-post wow fadeInUp" data-wow-duration="200ms">--}}
                            {{--<div class="blog-img">--}}
                                {{--<img src="images/resources/blog2.jpg" alt="">--}}
                                {{--<span class="blog-type"><i class="fa fa-picture-o"></i></span>--}}
                            {{--</div><!--blog-img end-->--}}
                            {{--<div class="blog-info">--}}
                                {{--<h3><a href="#" title="">Standart Blog Post Header Here</a></h3>--}}
                                {{--<div class="posted-ot">--}}
                                    {{--<h4>Posted on 17th May 2014</h4>--}}
                                    {{--<span><i class="fa fa-comment"></i> 12</span>--}}
                                {{--</div>--}}
                                {{--<p>Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi tristiquetus et senectus et netus et malesuada ac turpis.</p>--}}
                                {{--<a href="#" title="" class="btn-default">read more</a>--}}
                            {{--</div><!--blog-info end-->--}}
                        {{--</div><!--blog-post end-->--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="blog-post wow fadeInUp" data-wow-duration="300ms">--}}
                            {{--<div class="blog-img">--}}
                                {{--<img src="images/resources/blog3.jpg" alt="">--}}
                                {{--<span class="blog-type"><i class="fa fa-music"></i></span>--}}
                            {{--</div><!--blog-img end-->--}}
                            {{--<div class="blog-info">--}}
                                {{--<h3><a href="#" title="">Standart Blog Post Header Here</a></h3>--}}
                                {{--<div class="posted-ot">--}}
                                    {{--<h4>Posted on 17th May 2014</h4>--}}
                                    {{--<span><i class="fa fa-comment"></i> 12</span>--}}
                                {{--</div>--}}
                                {{--<p>Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi tristiquetus et senectus et netus et malesuada ac turpis.</p>--}}
                                {{--<a href="#" title="" class="btn-default">read more</a>--}}
                            {{--</div><!--blog-info end-->--}}
                        {{--</div><!--blog-post end-->--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="blog-post wow fadeInUp" data-wow-duration="100ms">--}}
                            {{--<div class="blog-img">--}}
                                {{--<img src="images/resources/blog1.jpg" alt="">--}}
                                {{--<span class="blog-type"><i class="fa fa-video-camera"></i></span>--}}
                            {{--</div><!--blog-img end-->--}}
                            {{--<div class="blog-info">--}}
                                {{--<h3><a href="#" title="">Standart Blog Post Header Here</a></h3>--}}
                                {{--<div class="posted-ot">--}}
                                    {{--<h4>Posted on 17th May 2014</h4>--}}
                                    {{--<span><i class="fa fa-comment"></i> 12</span>--}}
                                {{--</div>--}}
                                {{--<p>Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi tristiquetus et senectus et netus et malesuada ac turpis.</p>--}}
                                {{--<a href="#" title="" class="btn-default">read more</a>--}}
                            {{--</div><!--blog-info end-->--}}
                        {{--</div><!--blog-post end-->--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="blog-post wow fadeInUp" data-wow-duration="200ms">--}}
                            {{--<div class="blog-img">--}}
                                {{--<img src="images/resources/blog2.jpg" alt="">--}}
                                {{--<span class="blog-type"><i class="fa fa-picture-o"></i></span>--}}
                            {{--</div><!--blog-img end-->--}}
                            {{--<div class="blog-info">--}}
                                {{--<h3><a href="#" title="">Standart Blog Post Header Here</a></h3>--}}
                                {{--<div class="posted-ot">--}}
                                    {{--<h4>Posted on 17th May 2014</h4>--}}
                                    {{--<span><i class="fa fa-comment"></i> 12</span>--}}
                                {{--</div>--}}
                                {{--<p>Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi tristiquetus et senectus et netus et malesuada ac turpis.</p>--}}
                                {{--<a href="#" title="" class="btn-default">read more</a>--}}
                            {{--</div><!--blog-info end-->--}}
                        {{--</div><!--blog-post end-->--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="blog-post wow fadeInUp" data-wow-duration="300ms">--}}
                            {{--<div class="blog-img">--}}
                                {{--<img src="images/resources/blog3.jpg" alt="">--}}
                                {{--<span class="blog-type"><i class="fa fa-music"></i></span>--}}
                            {{--</div><!--blog-img end-->--}}
                            {{--<div class="blog-info">--}}
                                {{--<h3><a href="#" title="">Standart Blog Post Header Here</a></h3>--}}
                                {{--<div class="posted-ot">--}}
                                    {{--<h4>Posted on 17th May 2014</h4>--}}
                                    {{--<span><i class="fa fa-comment"></i> 12</span>--}}
                                {{--</div>--}}
                                {{--<p>Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi tristiquetus et senectus et netus et malesuada ac turpis.</p>--}}
                                {{--<a href="#" title="" class="btn-default">read more</a>--}}
                            {{--</div><!--blog-info end-->--}}
                        {{--</div><!--blog-post end-->--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div><!--blog-posts end-->--}}
            {{--<div class="spons-dv text-center mgt-40">--}}
                {{--<a href="#" title="" class="btn-default"><i class="fa fa-file-text-o"></i> see All News</a>--}}
            {{--</div><!--spons-dv end-->--}}
        {{--</div>--}}
    {{--</section><!--blog-sec end-->--}}


    <section class="register-sec sec-padding">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i
                                class="fa rhex fa-stack-2x"></i><i
                                class="fa fa-microphone fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Se rappeler de moi
                    <small>/ Ne manquez aucun événement!</small>
                </h3>
            </div><!--sec-title end-->
            <div class="register-sec-details">
                <form>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-field wow fadeInUp" data-wow-duration="100ms">
                                <input type="text" name="name_marketing" placeholder="Nom et Prénom">
                            </div><!--form-field end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-field wow fadeInUp" data-wow-duration="200ms">
                                <input type="email" name="email_marketing" placeholder="Adresse mail">
                            </div><!--form-field end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-field wow fadeInUp" data-wow-duration="300ms">
                                <input type="text" name="phone_marketing" placeholder="Numéro de téléphone">
                            </div><!--form-field end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-field wow fadeInUp" data-wow-duration="400ms">
                                <div class="drop-menu">
                                    <div class="select">
                                        <span>Selectionner votre plafond</span>
                                        <i class="fa fa-caret-down"></i>
                                    </div>
                                    <input type="hidden" name="gender">
                                    <ul class="dropeddown plafond">
                                        <li>250 HTG</li>
                                        <li>500 HTG</li>
                                        <li>1000 HTG</li>
                                        <li>1250 HTG</li>
                                        <li>1500 HTG</li>
                                        <li>2500 HTG</li>
                                        <li>Illimité</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-field text-center mgt-40 wow fadeInUp" data-wow-duration="300ms">
                                <button type="button" onclick="registerUser('Marketing', 0)" class="btn-default">S'enregistrer maintenant <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--register-sec-details end-->
        </div>
    </section><!--register-sec end-->

    <section class="map-sec" id="location" data-scroll-index="6">
        <div id="map"></div>
        <div class="contact_details">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i
                                class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i
                                class="fa fa-microphone fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Nous rencontrer</h3>
            </div><!--sec-title end-->
            <ul class="wow fadeInUp" data-wow-duration="300ms">
                <li>Vitoo</li>
                <li>3, Rue Solon Menos</li>
                <li>Port-au-prince, Haiti</li>
                <li> +509 3739-68-10</li>
                <li><a href="mailto:vitoohts@gmail.com" title="">vitoohts@gmail.com</a></li>
            </ul>
            <a href="#" title="" class="btn-default">obtenir la direction <i class="fa fa-arrow-circle-right"></i></a>
        </div><!--contact_details end-->
    </section><!--map-sec end-->


    <section class="contact-sec sec-padding">
        <div class="container">
            <div class="sec-title">
                <span class="icon-inner wow flipInY" data-wow-duration="300ms"><span class="fa-stack"><i
                                class="fa rhex fa-stack-2x" style="visibility: hidden;"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
                <h3 class="wow fadeInRight" data-wow-duration="500ms">Contactez nous
                    <small></small>
                </h3>
            </div><!--sec-title end-->
            <div class="contact-sec-details">
                <form class="js-ajax-form">
                    <div class="form-field">
                        <input type="text" name="name" placeholder="Entrez votre nom" required>
                    </div><!--form-field end-->
                    <div class="form-field">
                        <input type="email" name="email" placeholder="Entrez votre adresse mail" required>
                    </div><!--form-field end-->
                    <div class="form-field">
                        <textarea name="message" placeholder="Dites nous ?"></textarea>
                    </div><!--form-field end-->
                    <div class="form-field text-center">
                        <input type="submit" name="submit" value="Envoyer" class="btn-default">
                    </div><!--form-field end-->
                    <div class="form-field">
                        <div class="success-message">
                            <i class="fa fa-check text-primary"></i> Je vous remercie!. Votre message a été envoyé avec succès...
                        </div>
                        <div class="error-message">Nous sommes désolés, une erreur s'est produite
                        </div>
                    </div><!--form-group end-->
                </form>
            </div><!--contact-sec-details end-->
        </div>
    </section><!--contact-sec end-->

    <footer>
        <div class="container">
            <ul class="social-line list-inline">
                <li class="wow flipInY" data-wow-duration="100ms"><a href="=https://web.facebook.com/vitoohts" class="facebook"><i
                                class="fa fa-facebook"></i></a></li>
                <li class="wow flipInY" data-wow-duration="200ms"><a href="#" class="twitter"><i
                                class="fa fa-twitter"></i></a></li>
                <li class="wow flipInY" data-wow-duration="300ms"><a href="mailto:vitoohts@gmail.com" class="google"><i
                                class="fa fa-google-plus"></i></a></li>
                <li class="wow flipInY" data-wow-duration="400ms"><a href="https://www.linkedin.com/company/vitoohts" class="linkedin"><i
                                class="fa fa-linkedin"></i></a></li>
                <li class="wow flipInY" data-wow-duration="500ms"><a href="https://www.instagram.com/vitoohts/" class="instagram"><i
                                class="fa fa-instagram"></i></a></li>
            </ul>
            <p>© <?php echo date("Y"); ?> Vitoo — Check in securely</p>
        </div>
    </footer>

    <a href="#" title="" class="scrollTop"><i class="fa fa-angle-up"></i></a>

    <div class="side-panel-sec" style="visibility: hidden;">
        <h4>Settings <a href="#" title=""><i class="fa fa-cog spin"></i></a></h4>
        <div class="side-panel">
            <h5 class="side-title">Predefined Colors</h5>
            <div class="color-schemes">
                <ul>
                    <li><a onclick="setActiveStyleSheet('colour1'); return false;" class="colour1"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour2'); return false;" class="colour2"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour3'); return false;" class="colour3"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour4'); return false;" class="colour4"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour5'); return false;" class="colour5"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour6'); return false;" class="colour6"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour7'); return false;" class="colour7"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour8'); return false;" class="colour8"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour9'); return false;" class="colour9"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour10'); return false;" class="colour10"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour11'); return false;" class="colour11"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour12'); return false;" class="colour12"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour13'); return false;" class="colour13"></a></li>
                    <li><a onclick="setActiveStyleSheet('colour14'); return false;" class="colour14"></a></li>
                </ul>
            </div>
            <div class="two-layouts">
                <h5 class="side-title">Background Colors</h5>
                <ul>
                    <li class="active"><a href="index-light.html" title="">LIGHT</a></li>
                    <li><a href="index-dark.html" title="">DARK</a></li>
                </ul>
            </div>
            <div class="two-layouts">
                <h5 class="side-title">Layout</h5>
                <ul>
                    <li class="active"><a title="" class="wide-layout">Wide</a></li>
                    <li><a title="" class="boxed-layout">boxed</a></li>
                </ul>
            </div>
            <div class="two-layouts">
                <h5 class="side-title">Direction</h5>
                <ul>
                    <li class="active"><a title="" class="ltr-active">LTR</a></li>
                    <li><a title="" class="rtl-active">RTL</a></li>
                </ul>
            </div>
        </div>
    </div><!--side-panel-sec end-->

    <style>
        .cmp-img img{
            border: none !important;
            border-radius: 0px !important;
        }

        .cmpt-details{
            visibility: visible !important;
        }
    </style>

</div><!--wrapper end-->


<script  src="{{ asset('js/jquery.min.js') }}" ></script>
<script src="{{ asset('js/bootstrap.min.js') }}" ></script>
<script src="{{ asset('js/html5lightbox.js') }}" ></script>
<script src="{{ asset('js/switcher.js') }}" ></script>
<script src="{{ asset('js/datecounter.js') }}" ></script>
<script src="{{ asset('js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('js/validator.js') }}" ></script>
<script src="{{ asset('js/lib/slick/slick.js') }}" ></script>
<script src="{{ asset('js/wow.min.js') }}" ></script>
<script src="{{ asset('js/scrollIt.min.js') }}" ></script>
<script src="{{ asset('js/map.js') }}" ></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVwc4veKudU0qjYrLrrQXacCkDkcy3AeQ&callback=initMap"></script>
<script src="{{ asset('js/scripts.js') }}" ></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/api.js') }}"></script>

<script>
    // import * as Swal from "laravel-mix";

    $(window).on("load", function () {
        var string = $("#clockdiv").attr("event-date");
        // console.log("EVENT_DATE", string);
        initializeClock('clockdiv', string);
    });

    function showSuccess(message){
        Swal.fire(
            'Good job!',
            message,
            'success'
        );
    }

    function showError(message){
        Swal.fire(
            'Oups !',
            message,
            'error'
        );
    }

    function registerUser(destination, event_id) {
        var name = "";
        var email = "";
        var phone = "";
        var limit = "";

        if(destination === 'Marketing'){
            name = $("input[name=name_marketing]").val();
            email = $("input[name=email_marketing]").val();
            phone = $("input[name=phone_marketing]").val();
            limit = $(".register-sec-details div.drop-menu span.selected").text();
            // console.log("LIMIT", limit);
        }else{

        }

        if (!name) {
            showError("Veuillez spécifier votre nom complet svp...");
            return;
        }

        if (!email) {
            showError("Nous avons besoin d'un adresse mail :-)");
            return;
        }

        if(!validateEmail(email)){
            showError("L'adresse mail n'est pas valide !");
            return;
        }

        if (!phone) {
            showError("Veuillez mettre un numero de contact");
            return;
        }

        //TODO


    }

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
</script>
</body>

</html>

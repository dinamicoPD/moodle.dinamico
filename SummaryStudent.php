<?php
require_once(dirname(__FILE__).'/SummaryStudentController.php');
require_once('iconos.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen Inscripcion| Dinámico Pedagogia y Diseño</title>
    <link rel="icon" href="img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="css/8_0_1_normalize.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <link rel="stylesheet" href="css/styleParticulas.css">
	<link rel="stylesheet" href="css/formSmall.css" type="text/css">
	<link rel="stylesheet" href="css/formSmall_stdSummary.css" type="text/css">
</head>
<body>
<!--particulas-->
<div id="particles-js"></div>

<div class="contenedor" id="contenedor">
    <div class="Bienvenida">
        <svg id="letreritoIsaBella" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 258.66 95.4"><defs><style>.letreritoIsaBella{isolation:isolate;}.letreritoIsaBella-2{fill:#5689c8;}.letreritoIsaBella-3{font-size:26.56px;fill:#fff;font-family:HelveticaLTStd-Cond, Helvetica LT Std;letter-spacing:0.05em;}.letreritoIsaBella-4{font-family:HelveticaLTStd-BoldCond, Helvetica LT Std;font-weight:700;}.letreritoIsaBella-5{fill:#cec6ba;mix-blend-mode:multiply;}</style></defs><g class="letreritoIsaBella"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="letreritoIsaBella-2" d="M.05,0H214a44.71,44.71,0,0,1,44.71,44.71v6A44.71,44.71,0,0,1,214,95.4H.05a0,0,0,0,1,0,0V0A0,0,0,0,1,.05,0Z" transform="translate(258.71 95.4) rotate(-180)"/><text class="letreritoIsaBella-3" transform="translate(85.21 23.5)">Resumen<tspan class="letreritoIsaBella-4"><tspan x="-26.31" y="31.87">INSCRIPCIÓN</tspan><tspan x="-21.94" y="63.74">ESTUDIANTE</tspan></tspan></text><path class="letreritoIsaBella-5" d="M5.61,25.09a47.68,47.68,0,0,0,1.75,7.57c14.08,43.82,97,70.88,175.48,45.67C216.69,67.45,237.75,38.88,258.61,20V95.23H47.7A47.7,47.7,0,0,1,0,47.53H0A47.42,47.42,0,0,1,5.61,25.09Z"/></g></g></g></svg>
        <svg id="arbolitoIsa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 804.31 890">
            <defs>
                <style>
                    .cls-1,.cls-2,.cls-33,.cls-98{
                        fill:none;
                    }
                    .cls-1{
                        clip-rule:evenodd;
                    }
                    .cls-3{
                        isolation:isolate;
                    }
                    .cls-4{
                        fill:#9f9613;
                    }
                    .cls-161,.cls-5{
                        fill:#6d885e;
                    }
                    .cls-5,.cls-53{
                        opacity:0.31;
                    }
                    .cls-145,.cls-150,.cls-151,.cls-30,.cls-37,.cls-38,.cls-39,.cls-40,.cls-46,.cls-48,.cls-5,.cls-53,.cls-64{
                        mix-blend-mode:multiply;
                    }
                    .cls-6{
                        fill:#a0b564;
                    }
                    .cls-7{
                        fill:#c9c4d1;
                    }
                    .cls-8{
                        fill:url(#calabero_567);
                    }
                    .cls-9{
                        fill:url(#calabero_519);
                    }
                    .cls-10{
                        fill:url(#calabero_567-2);
                    }
                    .cls-11{
                        fill:url(#calabero_567-3);
                    }
                    .cls-12{
                        fill:url(#calabero_557);
                    }
                    .cls-13{
                        fill:url(#calabero_557-2);
                    }
                    .cls-14{
                        fill:url(#calabero_567-4);
                    }
                    .cls-15{
                        fill:url(#calabero_567-5);
                    }
                    .cls-16{
                        fill:url(#calabero_519-2);
                    }
                    .cls-17{
                        fill:url(#calabero_519-3);
                    }
                    .cls-18{
                        fill:url(#calabero_557-3);
                    }
                    .cls-19{
                        fill:#7e7607;
                    }
                    .cls-20{
                        fill:#948d08;
                    }
                    .cls-21,.cls-23{
                        font-size:42.32px;
                        font-family:Poppins-Black, Poppins;
                        font-weight:800;
                    }
                    .cls-112,.cls-126,.cls-21,.cls-96{
                        fill:#9b532b;
                    }
                    .cls-22{
                        font-size:60.17px;
                    }
                    .cls-110,.cls-143,.cls-23,.cls-28{
                        fill:#fff;
                    }
                    .cls-24{
                        fill:gray;
                    }
                    .cls-25{
                        fill:#afafaf;
                    }
                    .cls-143,.cls-26{
                        opacity:0.15;
                    }
                    .cls-27{
                        fill:#f48121;
                    }
                    .cls-29{
                        fill:#d7d87e;
                    }
                    .cls-141,.cls-30,.cls-53{
                        fill:#cec6ba;
                    }
                    .cls-31{
                        fill:#7c640c;
                    }
                    .cls-32{
                        fill:#b0a819;
                    }
                    .cls-33{
                        stroke:#454444;
                        stroke-linecap:round;
                        stroke-linejoin:round;
                        stroke-width:1.5px;
                    }
                    .cls-34{
                        fill:#454444;
                    }
                    .cls-35{
                        fill:url(#calabero_29);
                    }
                    .cls-36{
                        fill:url(#calabero_29-2);
                    }
                    .cls-37,.cls-38,.cls-41,.cls-43,.cls-49,.cls-64{
                        fill:#bd4f81;
                    }
                    .cls-37,.cls-48{
                        opacity:0.2;
                    }
                    .cls-38,.cls-40{
                        opacity:0.49;
                    }
                    .cls-145,.cls-150,.cls-151,.cls-39,.cls-46{
                        opacity:0.3;
                    }
                    .cls-39{
                        fill:url(#calabero_5);
                    }
                    .cls-42{
                        clip-path:url(#clip-path);
                    }
                    .cls-43{
                        font-size:0.99px;
                        font-family:Cordelina;
                        letter-spacing:-0.05em;
                    }
                    .cls-44{
                        fill:url(#Degradado_sin_nombre_15);
                    }
                    .cls-45{
                        clip-path:url(#clip-path-2);
                    }
                    .cls-47{
                        fill:#821D2E;
                    }
                    .cls-126,.cls-127,.cls-128,.cls-129,.cls-130,.cls-131,.cls-47,.cls-49,.cls-58,.cls-59,.cls-60,.cls-61,.cls-62,.cls-63,.cls-64,.cls-65,.cls-66,.cls-67,.cls-68,.cls-70,.cls-71,.cls-72,.cls-73,.cls-74,.cls-75,.cls-76,.cls-77,.cls-78,.cls-79,.cls-80,.cls-81,.cls-82,.cls-83,.cls-84{
                        fill-rule:evenodd;
                    }
                    .cls-50{
                        fill:url(#calabero_116);
                    }
                    .cls-51{
                        clip-path:url(#clip-path-3);
                    }
                    .cls-52{
                        fill:#c05e0a;
                    }
                    .cls-54{
                        fill:#e56654;
                    }
                    .cls-55{
                        fill:#c65949;
                    }
                    .cls-56{
                        fill:#ee7d4c;
                    }
                    .cls-57{
                        fill:#ad3f3f;
                    }
                    .cls-58{
                        fill:#a73330;
                    }
                    .cls-59{
                        fill:url(#calabero_163);
                    }
                    .cls-60{
                        fill:url(#calabero_87);
                    }
                    .cls-138,.cls-61{
                        fill:#5f2b08;
                    }
                    .cls-62{
                        fill:url(#calabero_146);
                    }
                    .cls-63{
                        fill:url(#calabero_137);
                    }
                    .cls-64{
                        opacity:0.5;
                    }
                    .cls-65{
                        fill:url(#calabero_137-2);
                    }
                    .cls-66{
                        fill:url(#calabero_150);
                    }
                    .cls-67{
                        fill:url(#calabero_87-2);
                    }
                    .cls-68{
                        fill:#260000;
                        opacity:0.47;
                        mix-blend-mode:soft-light;
                    }
                    .cls-69{
                        fill:url(#Degradado_sin_nombre_61);
                    }
                    .cls-70{
                        fill:#a0223d;
                    }
                    .cls-71{
                        fill:url(#calabero_163-2);
                    }
                    .cls-72{
                        fill:url(#calabero_87-3);
                    }
                    .cls-142,.cls-73{
                        fill:#472006;
                    }
                    .cls-74{
                        fill:url(#calabero_146-2);
                    }
                    .cls-75{
                        fill:url(#calabero_137-3);
                    }
                    .cls-76{
                        fill:url(#calabero_137-4);
                    }
                    .cls-77{
                        fill:url(#calabero_150-2);
                    }
                    .cls-78{
                        fill:url(#calabero_163-3);
                    }
                    .cls-79{
                        fill:url(#calabero_87-4);
                    }
                    .cls-80{
                        fill:url(#calabero_146-3);
                    }
                    .cls-81{
                        fill:url(#calabero_137-5);
                    }
                    .cls-82{
                        fill:url(#calabero_137-6);
                    }
                    .cls-83{
                        fill:url(#calabero_150-3);
                    }
                    .cls-84{
                        fill:url(#calabero_87-5);
                    }
                    .cls-85{
                        fill:#6a5607;
                    }
                    .cls-86{
                        fill:#928100;
                    }
                    .cls-87{
                        fill:#a89700;
                    }
                    .cls-88{
                        fill:#baa700;
                    }
                    .cls-89{
                        fill:url(#calabero_29-3);
                    }
                    .cls-90{
                        fill:url(#calabero_29-4);
                    }
                    .cls-91{
                        fill:#fac28a;
                    }
                    .cls-92{
                        fill:#e5a876;
                    }
                    .cls-93{
                        fill:#ffd9bd;
                    }
                    .cls-94{
                        fill:#2b2b2b;
                    }
                    .cls-95{
                        fill:#cc905e;
                    }
                    .cls-97{
                        fill:#8e4825;
                    }
                    .cls-112,.cls-98{
                        stroke:#9b532b;
                        stroke-miterlimit:10;
                        stroke-width:2px;
                    }
                    .cls-131,.cls-99{
                        fill:#00a2e9;
                    }
                    .cls-100{
                        fill:#c96e00;
                    }
                    .cls-101{
                        fill:#efda20;
                    }
                    .cls-102{
                        fill:#6a200f;
                    }
                    .cls-103{
                        fill:#61bc53;
                    }
                    .cls-104{
                        fill:#aef998;
                    }
                    .cls-105{
                        fill:#964b3c;
                    }
                    .cls-106{
                        fill:#edb70a;
                    }
                    .cls-107{
                        fill:#f7e946;
                    }
                    .cls-108{
                        fill:#fcbb29;
                    }
                    .cls-109{
                        fill:#fcd323;
                    }
                    .cls-110{
                        opacity:0.4;
                    }
                    .cls-111{
                        fill:#ffcda4;
                    }
                    .cls-113{
                        fill:#844221;
                    }
                    .cls-114{
                        fill:#b2653f;
                    }
                    .cls-115{
                        fill:#fac18a;
                    }
                    .cls-116{
                        fill:#e8ab79;
                    }
                    .cls-117{
                        fill:#773818;
                    }
                    .cls-118{
                        fill:#e0a370;
                    }
                    .cls-119{
                        fill:#af6845;
                    }
                    .cls-120{
                        fill:#ffd8b8;
                    }
                    .cls-121{
                        fill:#8c0000;
                    }
                    .cls-122{
                        fill:#720000;
                    }
                    .cls-123{
                        fill:#e588b9;
                    }
                    .cls-124{
                        fill:#c969a0;
                    }
                    .cls-125{
                        fill:#f4aed6;
                    }
                    .cls-127,.cls-129{
                        fill:#fefefe;
                    }
                    .cls-129{
                        opacity:0.25;
                    }
                    .cls-130{
                        fill:#065a8a;
                    }
                    .cls-132{
                        fill:#f7bc46;
                    }
                    .cls-133{
                        fill:#d89a36;
                    }
                    .cls-134{
                        fill:#f4cb56;
                    }
                    .cls-135{
                        fill:#345b60;
                    }
                    .cls-136{
                        fill:#417175;
                    }
                    .cls-137{
                        fill:#f29450;
                    }
                    .cls-139{
                        fill:#903a01;
                    }
                    .cls-140{
                        fill:#ced8c7;
                    }
                    .cls-144{
                        fill:url(#calabero_609);
                    }
                    .cls-145{
                        fill:url(#calabero_618);
                    }
                    .cls-146{
                        fill:url(#calabero_609-2);
                    }
                    .cls-147{
                        fill:url(#calabero_609-3);
                    }
                    .cls-148{
                        fill:url(#calabero_609-4);
                    }
                    .cls-149{
                        fill:#815235;
                    }
                    .cls-150{
                        fill:url(#calabero_5-2);
                    }
                    .cls-151{
                        fill:url(#calabero_5-3);
                    }
                    .cls-152{
                        fill:#f7bc8e;
                    }
                    .cls-153{
                        fill:url(#calabero_567-6);
                    }
                    .cls-154{
                        fill:url(#calabero_519-4);
                    }
                    .cls-155{
                        fill:url(#calabero_567-7);
                    }
                    .cls-156{
                        fill:url(#calabero_557-4);
                    }
                    .cls-157{
                        fill:url(#calabero_567-8);
                    }
                    .cls-158{
                        fill:url(#calabero_519-5);
                    }
                    .cls-159{
                        fill:url(#calabero_557-5);
                    }
                    .cls-160{
                        fill:#716914;
                    }
                    .cls-162{
                        fill:#9a1e11;
                    }
                    .cls-163{
                        fill:#fff0b3;
                    }
                </style>
                <linearGradient id="calabero_567" x1="543.44" y1="535.84" x2="558.67" y2="535.84" gradientUnits="userSpaceOnUse">
                    <stop offset="0.01" stop-color="#de2c2c"/>
                    <stop offset="0.4" stop-color="#e02d2f"/>
                    <stop offset="0.65" stop-color="#e73037"/>
                    <stop offset="0.85" stop-color="#f23545"/>
                    <stop offset="1" stop-color="#ff3b56"/>
                </linearGradient>
                <linearGradient id="calabero_519" x1="561.62" y1="533.59" x2="578.32" y2="533.59" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#feb134"/>
                    <stop offset="0.41" stop-color="#feb436"/>
                    <stop offset="0.66" stop-color="#febc3d"/>
                    <stop offset="0.87" stop-color="#ffca49"/>
                    <stop offset="1" stop-color="#ffd854"/>
                </linearGradient>
                <linearGradient id="calabero_567-2" x1="595.8" y1="527.98" x2="613.17" y2="527.98" xlink:href="#calabero_567"/>
                <linearGradient id="calabero_567-3" x1="680.06" y1="477.24" x2="702.76" y2="477.24" xlink:href="#calabero_567"/>
                <linearGradient id="calabero_557" x1="613.05" y1="522.8" x2="632.22" y2="522.8" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#59a6e0"/>
                    <stop offset="0.07" stop-color="#5da5e6"/>
                    <stop offset="0.29" stop-color="#67a3f4"/>
                    <stop offset="0.56" stop-color="#6da1fc"/>
                    <stop offset="1" stop-color="#6fa1ff"/>
                </linearGradient>
                <linearGradient id="calabero_557-2" x1="525.9" y1="535.84" x2="540.76" y2="535.84" xlink:href="#calabero_557"/>
                <linearGradient id="calabero_567-4" x1="630.43" y1="515.23" x2="649.46" y2="515.23" xlink:href="#calabero_567"/>
                <linearGradient id="calabero_567-5" x1="698.05" y1="451.48" x2="719.21" y2="451.48" xlink:href="#calabero_567"/>
                <linearGradient id="calabero_519-2" x1="644.43" y1="507.35" x2="661.7" y2="507.35" xlink:href="#calabero_519"/>
                <linearGradient id="calabero_519-3" x1="690.32" y1="464.13" x2="709.02" y2="464.13" xlink:href="#calabero_519"/>
                <linearGradient id="calabero_557-3" x1="656.25" y1="499.32" x2="676" y2="499.32" xlink:href="#calabero_557"/>
                <linearGradient id="calabero_29" x1="141.07" y1="540.13" x2="681.58" y2="540.13" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#d54e16"/>
                    <stop offset="1" stop-color="#ae2920"/>
                </linearGradient>
                <linearGradient id="calabero_29-2" x1="334.96" y1="721.14" x2="646.42" y2="721.14" xlink:href="#calabero_29"/>
                <linearGradient id="calabero_5" x1="616.58" y1="353.73" x2="681.58" y2="353.73" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#f7c6c1"/>
                    <stop offset="0.99" stop-color="#ba5f59"/>
                </linearGradient>
                <clipPath id="clip-path">
                    <path class="cls-1" d="M239.76,438.53a2,2,0,0,0-.51-.38.3.3,0,0,0-.11-.06.29.29,0,0,0-.16,0,.19.19,0,0,0-.14.12.17.17,0,0,0,0,.12,1.88,1.88,0,0,0-.06.63s-1.08-.16-.84.19a3.39,3.39,0,0,0,1.6.54.42.42,0,0,0,.43-.24,3,3,0,0,0,.45-1.41C240.29,437.65,239.76,438.53,239.76,438.53Z"/>
                </clipPath>
                <radialGradient id="Degradado_sin_nombre_15" cx="317.03" cy="404.21" r="73.62" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#863134"/>
                    <stop offset="0.13" stop-color="#882b35"/>
                    <stop offset="0.47" stop-color="#8a2336"/>
                    <stop offset="1" stop-color="#8b2036"/>
                </radialGradient>
                <clipPath id="clip-path-2">
                    <polygon class="cls-2" points="388.43 479.98 253.65 479.98 252.86 465.21 252.79 463.79 245.63 328.44 387.7 330.63 388.43 479.98"/>
                </clipPath>
                <radialGradient id="calabero_116" cx="469.9" cy="334.64" r="118.07" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#e0551a"/>
                    <stop offset="0.55" stop-color="#c93c3a"/>
                    <stop offset="0.67" stop-color="#b43339"/>
                    <stop offset="0.88" stop-color="#962537"/>
                    <stop offset="1" stop-color="#8b2036"/>
                </radialGradient>
                <clipPath id="clip-path-3">
                    <path class="cls-2" d="M387.7,330.63c25.42-19.2,58-65.08,81.1-141.34,37.16,83.78,83.3,141.34,83.3,141.34L549.18,480H388.42Z"/>
                </clipPath>
                <linearGradient id="calabero_163" x1="441.97" y1="306.99" x2="509.25" y2="306.99" gradientUnits="userSpaceOnUse">
                    <stop offset="0.01" stop-color="#d94a43"/>
                    <stop offset="0.51" stop-color="#da4d41"/>
                    <stop offset="0.82" stop-color="#de553a"/>
                    <stop offset="1" stop-color="#e35e33"/>
                </linearGradient>
                <linearGradient id="calabero_87" x1="476.17" y1="340.4" x2="476.17" y2="272.87" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#ff884e"/>
                    <stop offset="0.5" stop-color="#fe864e"/>
                    <stop offset="0.68" stop-color="#fc7f4c"/>
                    <stop offset="0.8" stop-color="#f7744a"/>
                    <stop offset="0.91" stop-color="#f16347"/>
                    <stop offset="0.99" stop-color="#e94d42"/>
                    <stop offset="1" stop-color="#e84b42"/>
                </linearGradient>
                <linearGradient id="calabero_146" x1="474.38" y1="310.75" x2="473.89" y2="305.13" gradientUnits="userSpaceOnUse">
                    <stop offset="0.41" stop-color="#d95e51"/>
                    <stop offset="0.61" stop-color="#e2674a"/>
                    <stop offset="0.93" stop-color="#f97e38"/>
                    <stop offset="1" stop-color="#ff8433"/>
                </linearGradient>
                <linearGradient id="calabero_137" x1="470.75" y1="324.34" x2="477.67" y2="324.34" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#ff8133"/>
                    <stop offset="0.12" stop-color="#f2753d"/>
                    <stop offset="0.33" stop-color="#e46848"/>
                    <stop offset="0.58" stop-color="#dc604f"/>
                    <stop offset="0.99" stop-color="#d95e51"/>
                </linearGradient>
                <linearGradient id="calabero_137-2" x1="465.82" y1="290.2" x2="476.17" y2="290.2" xlink:href="#calabero_137"/>
                <linearGradient id="calabero_150" x1="467.58" y1="290.73" x2="467.58" y2="284.68" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#ff884e"/>
                    <stop offset="0.69" stop-color="#ff8a4c"/>
                    <stop offset="0.94" stop-color="#ff8f45"/>
                    <stop offset="1" stop-color="#ff9242"/>
                </linearGradient>
                <linearGradient id="calabero_87-2" x1="4046.72" y1="543.61" x2="4046.72" y2="450.48" gradientTransform="matrix(-0.79, -0.02, -0.12, 1.27, 3732.39, -143.01)" xlink:href="#calabero_87"/>
                <linearGradient id="Degradado_sin_nombre_61" x1="422.87" y1="408.23" x2="507.44" y2="457.38" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-opacity="0.7"/>
                    <stop offset="0.47" stop-color="#701a2b"/>
                    <stop offset="0.72" stop-color="#7f1d31"/>
                    <stop offset="1" stop-color="#8b2036"/>
                </linearGradient>
                <linearGradient id="calabero_163-2" x1="-820.32" y1="248.62" x2="-770.95" y2="248.62" gradientTransform="matrix(-0.99, 0.11, 0.11, 0.99, -470.11, 251.22)" xlink:href="#calabero_163"/>
                <linearGradient id="calabero_87-3" x1="-795.22" y1="277.88" x2="-795.22" y2="218.74" gradientTransform="matrix(-0.99, 0.11, 0.11, 0.99, -470.11, 251.22)" xlink:href="#calabero_87"/>
                <linearGradient id="calabero_146-2" x1="-796.47" y1="252.23" x2="-796.95" y2="246.68" gradientTransform="matrix(-0.99, 0.11, 0.11, 0.99, -470.11, 251.22)" xlink:href="#calabero_146"/>
                <linearGradient id="calabero_137-3" x1="-802.82" y1="233.91" x2="-795.22" y2="233.91" gradientTransform="matrix(-0.99, 0.11, 0.11, 0.99, -470.11, 251.22)" xlink:href="#calabero_137"/>
                <linearGradient id="calabero_137-4" x1="-799.19" y1="263.82" x2="-794.12" y2="263.82" gradientTransform="matrix(-0.99, 0.11, 0.11, 0.99, -470.11, 251.22)" xlink:href="#calabero_137"/>
                <linearGradient id="calabero_150-2" x1="-801.53" y1="234.38" x2="-801.53" y2="229.08" gradientTransform="matrix(-0.99, 0.11, 0.11, 0.99, -470.11, 251.22)" xlink:href="#calabero_150"/>
                <linearGradient id="calabero_163-3" x1="-759.81" y1="277.2" x2="-710.45" y2="277.2" gradientTransform="matrix(-1, 0.09, 0.09, 1, -475, 204.36)" xlink:href="#calabero_163"/>
                <linearGradient id="calabero_87-4" x1="-734.72" y1="306.46" x2="-734.72" y2="247.32" gradientTransform="matrix(-1, 0.09, 0.09, 1, -475, 204.36)" xlink:href="#calabero_87"/>
                <linearGradient id="calabero_146-3" x1="-735.97" y1="280.81" x2="-736.45" y2="275.26" gradientTransform="matrix(-1, 0.09, 0.09, 1, -475, 204.36)" xlink:href="#calabero_146"/>
                <linearGradient id="calabero_137-5" x1="-742.32" y1="262.49" x2="-734.72" y2="262.49" gradientTransform="matrix(-1, 0.09, 0.09, 1, -475, 204.36)" xlink:href="#calabero_137"/>
                <linearGradient id="calabero_137-6" x1="-738.69" y1="292.4" x2="-733.62" y2="292.4" gradientTransform="matrix(-1, 0.09, 0.09, 1, -475, 204.36)" xlink:href="#calabero_137"/>
                <linearGradient id="calabero_150-3" x1="-741.02" y1="262.96" x2="-741.02" y2="257.66" gradientTransform="matrix(-1, 0.09, 0.09, 1, -475, 204.36)" xlink:href="#calabero_150"/>
                <linearGradient id="calabero_87-5" x1="3103.85" y1="343.18" x2="3103.85" y2="304.75" gradientTransform="matrix(-1, 0.09, 0.09, 1, 3319.83, -151.19)" xlink:href="#calabero_87"/>
                <linearGradient id="calabero_29-3" x1="238.47" y1="332.33" x2="282.73" y2="332.33" xlink:href="#calabero_29"/>
                <linearGradient id="calabero_29-4" x1="140.28" y1="270.27" x2="235.69" y2="270.27" xlink:href="#calabero_29"/>
                <linearGradient id="calabero_609" x1="197.24" y1="588.38" x2="248.48" y2="588.38" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#067977"/>
                    <stop offset="0.46" stop-color="#097977"/>
                    <stop offset="0.73" stop-color="#117b76"/>
                    <stop offset="0.96" stop-color="#1f7e75"/>
                    <stop offset="1" stop-color="#227e75"/>
                </linearGradient>
                <linearGradient id="calabero_618" x1="198.88" y1="588.34" x2="235.4" y2="588.34" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#fff"/>
                    <stop offset="0.99" stop-color="#6a75c7"/>
                </linearGradient>
                <linearGradient id="calabero_609-2" x1="201.15" y1="573.72" x2="244.38" y2="573.72" xlink:href="#calabero_609"/>
                <linearGradient id="calabero_609-3" x1="200.2" y1="586.01" x2="203.67" y2="586.01" xlink:href="#calabero_609"/>
                <linearGradient id="calabero_609-4" x1="241.61" y1="585.13" x2="245.3" y2="585.13" xlink:href="#calabero_609"/>
                <linearGradient id="calabero_5-2" x1="205.88" y1="268.15" x2="236.22" y2="268.15" xlink:href="#calabero_5"/>
                <linearGradient id="calabero_5-3" x1="209.15" y1="370.12" x2="220.67" y2="370.12" xlink:href="#calabero_5"/>
                <linearGradient id="calabero_567-6" x1="97.43" y1="345.26" x2="117.3" y2="345.26" xlink:href="#calabero_567"/>
                <linearGradient id="calabero_519-4" x1="119.29" y1="350.32" x2="136.3" y2="350.32" xlink:href="#calabero_519"/>
                <linearGradient id="calabero_567-7" x1="155.71" y1="358.34" x2="172.47" y2="358.34" xlink:href="#calabero_567"/>
                <linearGradient id="calabero_557-4" x1="174.9" y1="359.43" x2="189.22" y2="359.43" xlink:href="#calabero_557"/>
                <linearGradient id="calabero_567-8" x1="192.49" y1="360.3" x2="205.8" y2="360.3" xlink:href="#calabero_567"/>
                <linearGradient id="calabero_519-5" x1="209.38" y1="360.01" x2="220.56" y2="360.01" xlink:href="#calabero_519"/>
                <linearGradient id="calabero_557-5" x1="222.83" y1="359.48" x2="236.34" y2="359.48" xlink:href="#calabero_557"/>
            </defs>
            <g class="cls-3">
                <g id="Capa_2" data-name="Capa 2">
                    <g id="Capa_1-2" data-name="Capa 1">
                        <path class="cls-4" d="M793.37,881.15c6.62,5,10.94,8.34,10.94,8.34L0,890V839.37s101.74-14.08,175.7-19.17c7.29-.49,14.6-1,22-1.43,52.68-3.27,104.21-2.38,156.9.53l113.69,6.29c72.77,4,142.71,9.9,214.4,14.64A207.32,207.32,0,0,1,793.37,881.15Z"/>
                        <path class="cls-5" d="M494.38,883.69,520,865.58c-113.66.3-227.8-5.53-344.38-20.36-16.71-2.13-29.62-2.17-36-7,0,0,24.94-11.74,36.15-18,7.29-.49,14.6-1,22-1.43,52.68-3.27,104.21-2.38,156.9.53l113.69,6.29c61.15,3.39,120.07,7.21,174.94,11.78,18.7,1.56,37.71,2.64,55.11,4.59,6.77.76,9.18,1.47,15.18,2.59C636.86,865.74,578.32,877.58,494.38,883.69Z"/>
                        <path class="cls-6" d="M167.17,808.38a38.48,38.48,0,0,0,4,19.22c-8.78-1.71-17.56-1.36-26.34-3.07,3.49-6.52,3.36-18.18,3.44-26.5.66,6.56,4.1,15,8.62,18.92q.51-5.22,1-10.42c-.14,4.66,2.9,9.17,6.78,10.06C165.49,813.85,166.33,811.12,167.17,808.38Z"/>
                        <path class="cls-7" d="M531.18,527.92q-16,0-32.88-1.42a1.46,1.46,0,0,1-1.33-1.58,1.44,1.44,0,0,1,1.58-1.32c48.89,4.13,92.66-.82,130.09-14.71,36-13.37,69.34-48.4,89.15-93.69a1.46,1.46,0,0,1,2.67,1.17c-20.12,46-54.06,81.61-90.8,95.25C600.44,522.47,567.42,527.92,531.18,527.92Z"/>
                        <polygon class="cls-8" points="543.45 526.47 544.06 546.02 552.36 538.21 558.4 544.8 558.67 525.66 543.45 526.47"/>
                        <polygon class="cls-9" points="561.62 524.91 565.87 543.6 571.56 536.34 578.32 541.65 576.88 523.58 561.62 524.91"/>
                        <polygon class="cls-4" points="579.62 523.46 582.81 541.45 588.01 534.21 594.33 539.3 592.15 521.27 579.62 523.46"/>
                        <polygon class="cls-10" points="595.8 520.61 600.46 538.77 604.6 530.96 613.17 535.58 608.91 517.2 595.8 520.61"/>
                        <polygon class="cls-11" points="680.06 475.8 693.76 488.61 693.04 479.8 702.76 479.08 689.27 465.88 680.06 475.8"/>
                        <polygon class="cls-12" points="618.86 533.59 613.05 515.76 625.91 512.01 632.23 528.46 623.53 525.77 618.86 533.59"/>
                        <polygon class="cls-13" points="526.49 545.21 525.9 526.47 539.3 526.47 540.76 544.02 533.16 539.01 526.49 545.21"/>
                        <polygon class="cls-14" points="630.43 510.7 639.03 525.4 642.41 519.23 649.46 520.06 642.48 505.06 630.43 510.7"/>
                        <polygon class="cls-15" points="698.05 452.78 712.89 461.13 712.71 454.1 719.21 451.26 705.61 441.83 698.05 452.78"/>
                        <polygon class="cls-16" points="644.43 503.83 655.18 516.69 655.12 509.45 661.7 511.02 653.97 498.01 644.43 503.83"/>
                        <polygon class="cls-17" points="690.32 464.71 705.13 472.55 702.34 465.87 709.02 464.83 696.94 455.71 690.32 464.71"/>
                        <polygon class="cls-18" points="656.25 495.74 665.32 509.61 667.25 501.45 676 503.83 666.04 489.03 656.25 495.74"/>
                        <polygon class="cls-4" points="668.42 486.1 678.18 477.9 687.36 491.42 679.74 490.54 678.31 499.31 668.42 486.1"/>
                        <path class="cls-19" d="M678.54,148.49c-3.7,24.86-21.32,43.23-43.9,51,2.52,12.33-3.95,29.1-15.68,33.64s-26.39-.52-32.83-11.33c2,16.64-9.5,33.9-25.66,38.35-12.92,3.55-27.07-.63-38-8.39S503,233.21,495.75,221.93a42.48,42.48,0,0,1-32.09,26.55c-14.34,2.4-29.81-5-39.05-16.22a33.94,33.94,0,0,1-12.72,20.22,39.1,39.1,0,0,1-18.24,8c-14.72,2.18-30-3.85-40.86-14-11.5-10.69-18.24-26.44-16.17-42a29.21,29.21,0,0,1-46.38-16.61c-2.17-9.53.29-20.59,7.17-27.53-.56-.14-1.11-.3-1.67-.48A25.4,25.4,0,0,1,286,117.5c6.41-6.27,16.24-10.42,24.86-7.9-.08-.74-.14-1.48-.17-2.24a67.79,67.79,0,0,1,.95-15.69,65.37,65.37,0,0,1,3.79-13.22A57.43,57.43,0,0,1,322.28,66a48.13,48.13,0,0,1,15.36-14c19.43-11,50-10.36,65.8,5.34-1.76-17.07,5.4-35.56,18.82-46.25A52.62,52.62,0,0,1,460.8.36a49.66,49.66,0,0,1,10.1,2.31l1.49.52a52.48,52.48,0,0,1,31.82,35.89C514,25.56,532.84,18,549.29,20.76A46.08,46.08,0,0,1,585,52.13c7-8.75,18.45-13.94,29.48-12.08A32.13,32.13,0,0,1,639,60.66c5.25,14.89-1.34,31.44-10.46,44.34a59.87,59.87,0,0,1,26.29-1.43c8.14,1.46,16.64,8.86,20.31,16.68S679.82,139.88,678.54,148.49Z"/>
                        <path class="cls-20" d="M485.73,105.81c8.19,5.61,20.55,3.83,26.83-3.86s5.53-20.17-1.61-27.06-19.06-6-26.53.57a26.38,26.38,0,0,0-44.87-10.35c-6.27,6.92-7.2,16.92-4.23,25.77-7.58-7.71-19.47-11.1-29.82-7.95s-18.47,13-19.06,23.76,6.8,21.69,17.22,24.59c-.64,5.48,3.89,10.58,9,12.58s11.2.77,15.64-2.5A24,24,0,0,0,437,127.65c4,8,12.4,14,21.35,14.75a26.79,26.79,0,0,0,23.42-10.78C487,124.35,489.21,114.09,485.73,105.81Z"/>
                        <path class="cls-20" d="M626,88.55c4.84-9.12,6.3-21.15,1.73-29.24a11,11,0,0,0-6.06-5.26c-5.86-1.81-11.61,3.36-14.48,8.78A37.67,37.67,0,0,0,603,84.46a19.12,19.12,0,0,0,3.07,9.15,9.76,9.76,0,0,0,8.27,4.33C619.18,97.61,623.73,92.81,626,88.55Z"/>
                        <path class="cls-20" d="M509.7,126.21c2.78,4.07,4.52,11,.28,12.31s-10.49-3.71-13.54-8c-2.87-4-4.91-11.07-.5-12.41S506.63,121.7,509.7,126.21Z"/>
                        <path class="cls-20" d="M457.1,12.63c4.49-.06,12.15,1.53,11.56,7.81-.55,5.69-7.34,9-12.55,9.48-4.81.43-11.95-1.89-11.78-7.61C444.5,16.38,452.09,12.7,457.1,12.63Z"/>
                        <path class="cls-20" d="M368.4,75.65c4.59,4,10.91,12.59,4.6,18.4-5.72,5.27-15.61,2.46-21.31-1.81-5.26-3.93-10.37-12.76-5-18.39C352.25,68,363.26,71.17,368.4,75.65Z"/>
                        <path class="cls-20" d="M358.41,100.63c3.63.23,9.73,2,8.87,7-.79,4.58-6.5,6.85-10.74,6.9-3.92,0-9.55-2.26-9.07-6.88C348,102.89,354.34,100.38,358.41,100.63Z"/>
                        <path class="cls-20" d="M507.54,111.57c2.75-.35,5.44.66,6,2.29s-1.14,3.3-3.89,3.68-5.47-.69-6.07-2.36S504.79,111.92,507.54,111.57Z"/>
                        <path class="cls-20" d="M593.89,54.41c3-2.94,6.7-3.65,8.23-1.63s.34,6-2.67,9-6.68,3.78-8.23,1.71S590.88,57.35,593.89,54.41Z"/>
                        <path class="cls-20" d="M472.4,3.2C454-.15,436.94,2.62,423.76,16a58.9,58.9,0,0,0-15.53,51.78,61.08,61.08,0,0,0-41-9,23.71,23.71,0,0,1,14.92-5.46C362.62,45,336.75,50.44,322.28,66a48.13,48.13,0,0,1,15.36-14c19.43-11,50-10.36,65.8,5.34-1.76-17.07,5.4-35.56,18.82-46.25A52.62,52.62,0,0,1,460.8.36a49.66,49.66,0,0,1,10.1,2.31l1.49.52Z"/>
                        <text class="cls-21" transform="translate(430.02 80.68) rotate(0.75)">
                        ¡HOLA
                        <tspan class="cls-22">
                            <tspan x="-107.72" y="68.77">DINAMIGO!</tspan>
                        </tspan>
                        </text>
                        <text class="cls-23" transform="translate(427.12 80.64) rotate(0.75)">
                        ¡HOLA
                        <tspan class="cls-22">
                            <tspan x="-107.72" y="68.77">DINAMIGO!</tspan>
                        </tspan>
                        </text>
                        <path class="cls-24" d="M321.85,111.79l0,5.3-3.05-.34S318.9,112.87,321.85,111.79Z"/>
                        <polygon class="cls-25" points="327.92 97.29 328.77 99.64 327.59 100.1 326.77 97.58 327.92 97.29"/>
                        <path class="cls-26" d="M327.18,97.48l.54,2a4.37,4.37,0,0,1,.91-.18l.14.39-1.18.46-.82-2.52Z"/>
                        <path class="cls-2" d="M327.64,99.67a1.71,1.71,0,0,1,.43-.14h0Z"/>
                        <polygon class="cls-2" points="328.07 99.53 328.07 99.53 328.07 99.53 328.07 99.53"/>
                        <path class="cls-27" d="M327.64,99.67l.43-.14A13.11,13.11,0,0,1,331.7,107h0l-.32.09a27.84,27.84,0,0,0-7.8,3.55h0C323.89,102.18,326.58,100.14,327.64,99.67Z"/>
                        <path class="cls-28" d="M327.48,99.72l.16,0c-1.06.47-3.75,2.51-4.06,11h0c-4.4,3-4.82,6.11-4.82,6.11S315.72,103.8,327.48,99.72Z"/>
                        <path class="cls-28" d="M340.22,105.83c-3.82-7.5-12-6.32-12.15-6.3h0A13.11,13.11,0,0,1,331.7,107h0a27.87,27.87,0,0,1,7.29-1.12C339.4,105.81,339.81,105.85,340.22,105.83Z"/>
                        <path class="cls-27" d="M340.22,105.83c.21,0,.86,0,1.69,0,1.42.07,4.1.15,4.46.11-2.63-3.7-8.72-9.47-18.3-6.46C328.18,99.51,336.4,98.33,340.22,105.83Z"/>
                        <path class="cls-26" d="M342.68,105.92l1.75,0c.43,0,1.42.06,1.94,0l-.08,0a10.59,10.59,0,0,0-1.55-.46c-.53-.13-1.07-.24-1.61-.34l-.29-.05c-.37-.06-.74-.11-1.12-.15s-.79-.09-1.19-.11-.85,0-1.27-.06-.89,0-1.33,0-.93,0-1.4.09-1,.11-1.44.18-1,.18-1.49.29-1,.25-1.53.4-1.05.33-1.56.52l-.2.08c-9.33,3.59-11.16,6.69-11.16,6.69a14.76,14.76,0,0,1,10-13.81l-1.07.3a1.71,1.71,0,0,0-.43.14l-.16.06c-11.76,4.08-8.72,17-8.72,17s.75-3.36,4.82-6.11a27.69,27.69,0,0,1,7.8-3.55l.32-.1a27.43,27.43,0,0,1,7.19-1.11l1,0a8.67,8.67,0,0,1,1.14,0Z"/>
                        <path class="cls-29" d="M313.2,100c.59-1,2.42-1.68,5.74-2.27a28.15,28.15,0,0,1,8.51-.37l.26.05-.23.15c-6.17,3.94-9.73,5-11.75,5.09a3.78,3.78,0,0,1-1.87-.33,1.56,1.56,0,0,1-.87-1.06A1.67,1.67,0,0,1,313.2,100Z"/>
                        <path class="cls-26" d="M315.73,102.64a3.78,3.78,0,0,1-1.87-.33,1.56,1.56,0,0,1-.87-1.06,2.64,2.64,0,0,1,0-.55c2.05,4,14.75-3.3,14.75-3.3l-.23.15C321.31,101.49,317.75,102.57,315.73,102.64Z"/>
                        <path class="cls-29" d="M327.38,97.37a44.46,44.46,0,0,1,8.33-5.25c2.29-1,3.85-1.23,4.77-.75a1.85,1.85,0,0,1,.91,1.19,1.54,1.54,0,0,1-.21,1.26c-.72,1.17-3.46,3.22-13.74,3.74l-.32,0Z"/>
                        <path class="cls-26" d="M327.12,97.58l.12-.1v0s15.09-.93,13.62-5.88a2,2,0,0,1,.53.91,1.54,1.54,0,0,1-.21,1.26c-.72,1.17-3.46,3.22-13.74,3.74Z"/>
                        <path class="cls-30" d="M411.89,252.48a39.1,39.1,0,0,1-18.24,8c-14.72,2.18-30-3.85-40.86-14-11.5-10.69-18.24-26.44-16.17-42a29.21,29.21,0,0,1-46.38-16.61c-2.17-9.53.29-20.59,7.17-27.53-.56-.14-1.11-.3-1.67-.48A25.4,25.4,0,0,1,286,117.5c6.41-6.27,16.24-10.42,24.86-7.9-.08-.74-.14-1.48-.17-2.24a67.79,67.79,0,0,1,.95-15.69,65.37,65.37,0,0,1,3.79-13.22c5.68,5.14,10,11.82,13.27,18.78,8.41,17.78,8.14,34.26,7.6,53.2,16.4-9.25,44.23-9.44,57.89,5.42,14.48,15.77,13.68,43.71,1.61,60.35C406.5,224.79,412.43,238.77,411.89,252.48Z"/>
                        <path class="cls-31" d="M725.39,371.61c-8.53-15-17.27-30.18-30-41.75-22.45-20.4-54.09-26.75-84.24-30.07-10.41-1.15-21.46-1.93-30.89,2.65-11.75,5.7-25.07,16.76-38,18.95,3.06,11.91,7.59,24.9,17.63,33.92,8.35,7.51,19.82,14.49,30.93,16.14s23.57-3.51,28.29-13.71a27.21,27.21,0,0,0,4.51,21c4.18,5.79,15.06,8.26,20.92,5.93.35,12,3.31,21.68,12.48,27.22,8.94,5.41,24.28,6.56,31,1.31.7,6.86,4.9,13.75,15.46,15.93,8.07,1.67,14.69-.23,21.25-4.73,8.07-5.54,12.22-15.95,11.3-25.69S730.24,380.11,725.39,371.61Z"/>
                        <path class="cls-4" d="M785.9,353.94c-6.31,11.09-15.91,18.95-31,21.68,8,8.34,14.89,17.55,16.86,28.93s-2.17,24.38-12.15,30.2a22.75,22.75,0,0,1-34-22.38c-9,7.29-24.45,5.38-31.37-3.93s-4.46-24.2,5.12-30.78c-6.56.43-13-2-16.66-7.47a19.31,19.31,0,0,1-1.35-18.8c-7.3,2.58-16.63.66-20.86-5.84a18,18,0,0,1,2-21.45,29.53,29.53,0,0,1-26.9,3.37,28.12,28.12,0,0,1-16.95-20.29c-.65,12.46-11.26,23.6-22.67,28.62s-25.11,3.94-36.09-2S540.54,317.6,536.08,306c-9.18,11.2-22.66,11.17-31.48,8.19s-16.13-10.61-17.89-19.75A18.88,18.88,0,0,1,488,282.57c1.78-3.61,5.32-7.66,9.29-8.37-.54-.95-1.08-1.91-1.58-2.89-6.21-11.86-9.7-25.25-8.49-38.51,1.32-14.35,8.61-28.46,20.69-36.35s28.92-8.66,40.77-.41a22.37,22.37,0,0,1,16.87-21.93,28.07,28.07,0,0,1,8.2-1,35.87,35.87,0,0,1,21.35,8.13c8.17,6.61,13.54,16.21,16.67,26.27,3.39-12,12.54-21.46,24.89-23.34a32.63,32.63,0,0,1,32,14.87c5.1-18.33,27.32-28.73,46-25.12,22.76,4.4,33.44,23,35.14,41.92s-6.55,37.52-22.23,51.53c23-3.32,42.83,6.46,54.65,24.23C792.37,306.83,797.92,332.82,785.9,353.94Z"/>
                        <path class="cls-32" d="M606.39,273.33a23.47,23.47,0,1,1,3.73-24.69A20.77,20.77,0,0,1,614.26,230a19.64,19.64,0,0,1,17.51-6.21c1-10.42,8.78-15.64,16.67-16.49s17.63,4.57,18.66,12.56a21.51,21.51,0,0,1,9.42-13.26c4.68-2.88,11.07-3.19,15.58,0s6.32,9.91,3.35,14.54a21,21,0,0,1,17.9,18.84c1.16,10.72-4.24,21.68-12.93,28.07s-20.26,8.33-30.81,6.09-17.7-5.89-24.82-14c1.34,4.62,2.88,9.84,1.58,14.46-3.16,11.17-11.9,13.24-18.13,13.24A23.81,23.81,0,0,1,606.39,273.33Z"/>
                        <path class="cls-32" d="M573.74,173.15A22.61,22.61,0,0,0,560,181.32c-5.26,6.65-6.66,15.87-4.7,24.13a41.32,41.32,0,0,0-41,10.58,24.92,24.92,0,0,1,11.08-16c-7.94.1-15.33,4.67-20.4,10.79s-8.1,13.64-10.51,21.2c-2.21,6.94-4.24,18.49,1.23,39.3-6.2-11.83-9.69-25.22-8.48-38.48,1.32-14.35,8.61-28.46,20.69-36.35s28.92-8.66,40.77-.41a22.37,22.37,0,0,1,16.87-21.93A28.07,28.07,0,0,1,573.74,173.15Z"/>
                        <path class="cls-32" d="M535.06,247c-5-4.2-9.67-12.34-4.75-15.59s14.68,1,20.11,5.38c5.09,4.12,10.19,12.34,5.05,15.63S540.58,251.62,535.06,247Z"/>
                        <path class="cls-32" d="M543,264.85c-3.37,1.43-7.16,1.11-8.5-.76s.27-4.61,3.63-6.08,7.23-1.07,8.58.84S546.4,263.42,543,264.85Z"/>
                        <path class="cls-32" d="M606.45,289.58c-.25,3.66-2.25,6.89-4.52,7.24s-4-2.32-3.78-6,2.31-6.92,4.62-7.26S606.7,285.92,606.45,289.58Z"/>
                        <path class="cls-32" d="M739.08,216.5c1.09-7.13-.72-15.4-5.61-19.68a7.7,7.7,0,0,0-5.21-2.07c-4.28.16-6.88,4.9-7.52,9.13A26.37,26.37,0,0,0,723,219.11a13.33,13.33,0,0,0,4.14,5.32,6.79,6.79,0,0,0,6.45.95C736.68,224.05,738.57,219.84,739.08,216.5Z"/>
                        <path class="cls-33" d="M497.28,274.65s20.2,19.26,66.88,16.76,56.41-31.24,56.41-31.24,5.86,35.8,57.21,53.48,90-10.37,102.25-23.07"/>
                        <path class="cls-34" d="M604,282.08l-.33-1.55-3.21.68.33,1.55a3.61,3.61,0,0,0-1.12,1.95l6.14-1.3A3.54,3.54,0,0,0,604,282.08Z"/>
                        <path class="cls-34" d="M574.34,288.2l.12,1.58,3.27-.24-.11-1.58a3.62,3.62,0,0,0,1.37-1.78l-6.26.45A3.58,3.58,0,0,0,574.34,288.2Z"/>
                        <path class="cls-34" d="M617.43,261.92l.89,1.31,2.71-1.84-.89-1.31a3.53,3.53,0,0,0,.3-2.23l-5.19,3.52A3.55,3.55,0,0,0,617.43,261.92Z"/>
                        <path class="cls-34" d="M651.32,302.23l.49-1.51-3.12-1-.49,1.51a3.55,3.55,0,0,0-1.94,1.13l6,1.93A3.54,3.54,0,0,0,651.32,302.23Z"/>
                        <path class="cls-34" d="M701.7,320.59l0-1.59-3.29.07,0,1.58a3.55,3.55,0,0,0-1.47,1.71l6.28-.12A3.57,3.57,0,0,0,701.7,320.59Z"/>
                        <path class="cls-34" d="M756.55,309.72l-.47-1.51-3.13,1,.47,1.52a3.61,3.61,0,0,0-.93,2.05l6-1.87A3.51,3.51,0,0,0,756.55,309.72Z"/>
                        <path class="cls-34" d="M633.74,281.81l-1.43.7,1.43,2.95,1.43-.7a3.52,3.52,0,0,0,2.17.62l-2.75-5.65A3.51,3.51,0,0,0,633.74,281.81Z"/>
                        <path class="cls-34" d="M675.24,310.47l-1.18,1.06,2.19,2.45,1.18-1.06a3.54,3.54,0,0,0,2.25,0l-4.18-4.67A3.49,3.49,0,0,0,675.24,310.47Z"/>
                        <path class="cls-34" d="M726.27,316.08l.41,1.54,3.17-.85-.41-1.53a3.6,3.6,0,0,0,1-2l-6.07,1.61A3.5,3.5,0,0,0,726.27,316.08Z"/>
                        <path class="cls-34" d="M772.14,294.75l.76,1.39,2.88-1.57-.76-1.39a3.58,3.58,0,0,0,.51-2.2L770,294A3.57,3.57,0,0,0,772.14,294.75Z"/>
                        <path class="cls-35" d="M411.25,665.62c-4.4,34.35,5.45,67.32,20.59,100.82,4.15,9.19,9.85,17.5,16.17,25.37,4.18,5.18,9.35,7.57,24.42,15.4,16.2,8.41,32.12,16,50.15,18.74,12.78,1.95,26.7,1.38,39.62,1.24,27.38-.3,60.2,2.88,84.22,12.35-45.14-4.15-65.93-3.16-99.06,0-2.23.22-4.42.38-6.55.5-17.45,1-31.66-1-44.25-2h0c-2.64-.19-5.19-.35-7.7-.43-13.55-.4-25.06,1-42.49,2.67a175.52,175.52,0,0,1-21.66.66c-3-.06-6-.21-8.93-.41-14.59-1-37.64-9.27-53.19-8.31-16,1-32.7,4.36-49.93,6.91-.94.16-1.87.29-2.79.42-2.09.31-4.12.56-6.1.77-12,1.3-22.12,1.14-34.93.94-6.47-.11-13.11-.25-24.32-1.33-24.14-2.33-40.1-6.22-48.15-6.16-19.56.13-38.79,3.71-52.12,5.4-1.08.15-2.13.27-3.14.38,4.23-11.29,24.39-19.28,36.14-22,23.36-5.44,42.66-.34,52-11.74,11.73-14.34,16.7-22.87,27.19-37.16,14.09-19.19,21.28-34,25.26-49.54,12.23-47.88,12.74-67.55,0-111.69q-1.35-4.7-2.92-9.76c-1.19-3.92-2.49-8-3.87-12.37a170.78,170.78,0,0,0-21-43.25c-1.91-2.83-3.73-5.56-5.51-8.25-5.55-8.42-10.56-16.26-15.72-24.23-7.39-11.44-15-23.15-24.92-37.33S192.55,450.85,191,431.57c-2.11-26-3.78-37.65-6.44-67.52-1.14-12.66-1.46-39.34-5-49.53l19,10.81,9.12,5.2c.18,12.26,1.53,29.87,3.84,40.31,1.28,5.84,2.87,9.43,4.7,8.57a2.4,2.4,0,0,0,.7-.54c7-7.41,13.52-9.94,22.09-15.07l.79,4,2.94,15.2.6,3.07,0,.25.43,2.17c-7.71,7.35-10.63,11-9.39,24.89.85,9.53,3.27,18.07,9.21,28.6,5.79,10.25,12.44,18.83,19.69,28.1,4.24,5.42,8.18,10.6,11.9,15.08,2.39,2.9,4.68,5.49,6.86,7.65l.22.2c3,2.94,5.8,5.06,8.44,6a5.73,5.73,0,0,0,.7.23,9.19,9.19,0,0,0,1.48.29c5.58.59,10.93-2.37,14.65-6.71.22-.27.44-.53.64-.79a22.7,22.7,0,0,0,2.1-3.18,39.61,39.61,0,0,0,3.95-12.25c.49-2.84.8-5.74,1.12-8.61,2.14-19.7,5.53-41.06,7.91-60.72,2.87-23.79,8.74-45.67,11.66-73.63.7-6.83,1.16-13.69,2-20.51.42-3.3.67-9.26,1.34-12.51l5.11-2.5A38.09,38.09,0,0,0,360.92,271c7.78,1.85,16.07-2.85,21.59-9.21,0,0,7.23,1,12.65.05A34,34,0,0,0,406.64,258c7.3-4.12,12.13-9.4,18-19.09-17.42,46-23.21,67.2-26.65,81.94-14.25,61.09-22.26,109-23.68,155.79-.13,4.62-.2,9.22-.21,13.83,0,.8,0,1.58.05,2.39A65.51,65.51,0,0,0,381,518.59a60.69,60.69,0,0,0,4.47,7.71c.29.42.6.84.9,1.25s.62.83,1,1.22.64.8,1,1.18.73.83,1.11,1.23.65.65,1,1c.52.51,1.06,1,1.63,1.46.39.32.8.64,1.22.92.19.14.4.27.6.42a18.12,18.12,0,0,0,5.55,2.54l.69.16c.29.07.58.11.87.16l.9.11c10.2,1,11.51,2.93,24.06-6.92,19.66-15.41,36.72-23.33,54.13-33.38q4.29-2.47,8.63-4.79c8.65-4.64,17.48-8.89,26.3-13.09,24.71-11.77,49.41-23.08,70.48-40.9,1.32-1.12,2.56-2.3,3.79-3.53,5.11-5.14,8.07-15.21,7.56-22.45-.85-11.83-3.27-15.58-8.19-21.49-16.23-19.57-20.82-39.88-28.27-56.71a62.57,62.57,0,0,0,13.14,4.88c5.63,15.49,8.14,21.16,17.18,36,2.6,4.24,7.84,9.14,12.39,11.1,6.18,2.67,8.8,1.31,10.46-5.2,2.07-8.12,4.65-14.79,6.5-22.26,2.42-9.71,3.26-9.87,13.1-18.26a149.87,149.87,0,0,1,13.78-10.26,51.55,51.55,0,0,0,13.8-3.23c-27.29,24.49-25.92,19-28.5,27.33-1.28,4.17-2.55,17.49-2.55,17.49-.38,2.53,1.82,6.38,6.75,3.29,12-7.58,39.5-16.93,45.15-19.25a21.14,21.14,0,0,0-.29,7.77c-18.59,4.79-35.92,16.3-52.19,27.43-6.14,4.2-11.25,9.81-11.53,17.23-.26,6.86-.46,12-.81,15.88-.46,5.19-1.17,8.26-2.63,10.49a150.89,150.89,0,0,1-12.31,16.8q-2.27,2.67-4.92,5.42c-3.33,3.43-6.63,6.57-10.1,9.6-1.08,1-2.17,1.88-3.29,2.8-8.78,7.32-18.73,14.22-32.09,23.13l-4.27,2.84c-6.45,4.28-14.38,9.54-22.15,14.67-11.55,7.65-22.79,15-28.4,18.36a207.48,207.48,0,0,0-48.87,41.69c-.68.8-1.34,1.57-2,2.34-8.32,9.82-14.16,17.37-18.5,25.14a75.55,75.55,0,0,0-3.79,7.72c-3.29,7.71-5.54,16.31-7.56,27.87-.34,1.83-.65,3.73-1,5.72C413.74,646.68,412.57,655.35,411.25,665.62Z"/>
                        <path class="cls-36" d="M646.42,839.54c-45.14-4.15-65.93-3.16-99.06,0-2.23.22-4.42.38-6.55.5-17.45,1-31.66-1-44.25-2h0c-28.23-5.34-58.86-19.37-77.36-37.54,2,3.8,4.9,19.33,6.94,23.13-24.73-18-35.72-55.68-41-85.78a493.38,493.38,0,0,1-7.29-87.49c0-6.92-.76-18.86-.76-18.86C363,626.32,335,613.71,335,613.71c18.33-9.86,48.69-12.18,69.5-11.65,6.39.18,13.16,1.07,19,3.53-3.82,8.93-6.22,19-8.53,33.59-1.19,7.5-2.36,16.17-3.68,26.44-4.4,34.35,5.45,67.32,20.59,100.82,4.15,9.19,9.85,17.5,16.17,25.37,4.18,5.18,9.35,7.57,24.42,15.4,16.2,8.41,32.12,16,50.15,18.74,12.78,1.95,26.7,1.38,39.62,1.24C589.58,826.89,622.4,830.07,646.42,839.54Z"/>
                        <path class="cls-37" d="M380.58,519.48a65.45,65.45,0,0,1-6.86-25.76c0-.8-.06-1.59-.06-2.39q0-6.9.22-13.82h-.64l-.12,13.31-54.64,1.36-.13-14.67h-4.62a39.34,39.34,0,0,1-4,12.25,22.63,22.63,0,0,1-2.09,3.18l2.65,155.41h9.47l-.13-15.29,0,0L371.9,635l-.12,13.35h9.47l2.12-123.77C382.33,522.89,381.41,521.17,380.58,519.48Zm-8.59,105-52.39.39-.2-24.14,52.78.67Zm.26-31.12-52.92-1.4-.22-25.11,53.36.61Zm.25-29v-5.73l-53.46-1-.21-24,53.91,1.12Zm.33-38.79-54.07-.35-.22-25L373,502Zm.22-26.87-54.52-1.37,54.52,1.36Z"/>
                        <path class="cls-38" d="M551.42,492.83l-4.27,2.84c-6.45,4.28-14.38,9.54-22.15,14.67-11.55,7.65-22.79,15-28.4,18.36a207.48,207.48,0,0,0-48.87,41.69c-.68.8-1.34,1.57-2,2.34-20,23.85-25.31,38.57-30.82,66.45l-43.69-30.3-64.42-5.21-25.18,3.74q-1.35-4.7-2.92-9.76c-1.19-3.92-2.49-8-3.87-12.37a170.78,170.78,0,0,0-21-43.25c-1.91-2.83-3.73-5.56-5.51-8.25A74.76,74.76,0,0,1,244.42,515c-.78-12.53,2.34-25.11,4-37.54a7.43,7.43,0,0,1,1.54-4.32c1.73-1.81,4.93-1.34,6.82.3,3.09,2.71,3,6.82,4.76,10.23,2,3.92,5.22,7.56,9.62,8.67,3.34.83,7.72-.63,10.77.58.09,0,.17.08.26.12,3.09,1.35,5.06,4.69,8.44,6a6.38,6.38,0,0,0,.7.23,9.19,9.19,0,0,0,1.48.29c5.58.59,10.93-2.37,14.65-6.71h66.67A65.51,65.51,0,0,0,381,518.59a60.69,60.69,0,0,0,4.47,7.71c.29.42.6.84.9,1.25s.62.83,1,1.22.64.8,1,1.18.73.83,1.11,1.23.65.67,1,1c.52.51,1.06,1,1.63,1.46.39.32.8.64,1.22.92.21.16.4.29.6.42a18.12,18.12,0,0,0,5.55,2.54l.69.16c.29.07.58.11.87.16l.9.11c10.2,1,11.51,2.93,24.06-6.92,19.66-15.41,36.72-23.33,54.13-33.38q4.29-2.47,8.63-4.79Z"/>
                        <path class="cls-37" d="M646.42,839.54c-45.14-4.15-65.93-3.16-99.06,0-2.23.22-23.65.38-25.78.5-9.59,0-40.76-15.76-47.25-19.07-18.87-9.59-34.19-21.08-41.32-30.73-8.34-11.28-19.63-29.23-18.9-33.63q-1.86,11.14-3.73,22.29c-9.69-22.85-13.24-46-16.45-70.35a260.86,260.86,0,0,1,1.23-75.38c2.45-15,20.41-25.66,32.09-35.3-6.17,11-9.33,22.45-12.33,41.32-1.18,7.49-2.35,16.16-3.67,26.43-4.4,34.35,5.45,67.32,20.59,100.82,4.15,9.19,9.85,17.5,16.17,25.37,4.18,5.18,9.35,7.57,24.42,15.4,16.2,8.41,32.12,16,50.15,18.74,12.78,1.95,26.7,1.38,39.62,1.24C589.58,826.89,622.4,830.07,646.42,839.54Z"/>
                        <path class="cls-37" d="M306.1,840a306.48,306.48,0,0,1-37.3,1.21,4.52,4.52,0,0,1-.52,0c-6.31-.1-12.9-.26-23.8-1.31-16.14-1.56-28.61-3.82-37.52-5.11a74.51,74.51,0,0,0-10.63-1c-19.56.13-38.79,3.71-52.12,5.4,32.63-20.75,81.94,1.62,113.87-21.23,4.25-3,8-6.8,12.56-9.37s10.33-3.76,15-1.34c5.9,3.09,7.67,10.51,9.49,16.92C296.59,829.43,299.18,839.06,306.1,840Z"/>
                        <path class="cls-37" d="M424.67,840.93c-3-.06-6-.21-8.93-.41-14.59-1-37.64-9.27-53.19-8.31-6.21.38-13.49,1.27-21.08,2.35-12,1.7-24.8,3.92-35.37,5.48,6.5-.92,12.51-7.81,14.59-10.74C341.63,800,349.44,747,355.35,711.2c0-.25.21,0,.25.35.85,7.1,1.94,14.31,3.28,21.48,4.65,25.16,12.11,50,21.19,68.67C389.57,821.26,400.09,837,424.67,840.93Z"/>
                        <path class="cls-37" d="M272,831.18q-1.86,5-3.7,10.05c-6.31-.1-12.9-.26-23.8-1.31-16.14-1.56-28.61-3.82-37.52-5.11l-.62-.28c9.07-2.24,18.59.23,27.94.33a55.41,55.41,0,0,0,29.82-8.37c2.49-1.56,6.14-3.19,8-.86C273.26,827.16,272.65,829.36,272,831.18Z"/>
                        <path class="cls-37" d="M359.12,774.79c.72,14.11,3.4,27.76,12.11,39.78-2.25,0-4.25-1.47-5.66-3.22s-2.41-3.82-3.86-5.55-3.52-3.16-5.77-3c-3.71.29-6.21,6.31-7.94,10.39-2.33,5.47-5,10.07-6,16a52.33,52.33,0,0,0-.51,5.32c-12,1.7-24.8,3.92-35.37,5.48,6.5-.92,12.51-7.81,14.59-10.74C341.63,800,349.44,747,355.35,711.2a3.79,3.79,0,0,1,.25.35,9.45,9.45,0,0,1,.77,1.3c1.34,2.72,1.59,5.83,1.81,8.86q.39,5.65.7,11.32C359.62,746.68,358.42,761,359.12,774.79Z"/>
                        <path class="cls-38" d="M276.36,484.17a40.78,40.78,0,0,1,3.49,4.75c9.87,15.94-5.41,38-23.92,31.67-5.08-1.72-9.55-4.87-13.7-8.26a138.89,138.89,0,0,1-14.62-13.66c-1.28-1.39-6.29-5.61-6.25-7.54.06-3.28,5.25-3.08,7.79-3.69a15.42,15.42,0,0,0,10.58-9.2c3.27-8.29-1.89-15.21-6-21.86a224.77,224.77,0,0,1-11.87-22.72c-.84-1.79-2.21-4.32-2.43-6.28a27.72,27.72,0,0,1,0-7c1.94-8.57,4.8-12.65,9.18-20.28,3.4-5.92,9.18-12.39,14.11-17.09,2.84-2.71,6.12-.38,8.83-1.4-2.67,2.24-5.32,4.56-7.77,6.89-7.71,7.35-10.62,11-9.38,24.89.84,9.53,3.26,18.07,9.21,28.6a206.77,206.77,0,0,0,19.79,28.23C267.28,475.06,272.29,479.33,276.36,484.17Z"/>
                        <path class="cls-38" d="M291.36,499.25a15.11,15.11,0,0,1-3.8-.26c-2.54-.5-5.85-1.71-8.28-1.22-2,.41-3.94,1.27-6.26,1.38a55.79,55.79,0,0,1-19.83-2.91c-6.22-2.11-5.82-8.62-5.5-14.45.53-9.78-1.65-15.49-6.78-23.51a149.3,149.3,0,0,1-11.33-21.35c-2.46-5.71-5.56-9.67-5.2-15.87a48.52,48.52,0,0,1,5.1-17.58c3.5-6.44,7.89-11.27,13.19-16.48a120.33,120.33,0,0,1,12.19-10.08,129.93,129.93,0,0,0,11.9-9.23c3.18-2.93,6.22-6.38,7.77-11.73a17.86,17.86,0,0,1-4.5,9.79c-3.77,4.17-11.22,9.74-18.53,15.87-2.67,2.24-5.32,4.56-7.77,6.89-7.71,7.35-10.62,11-9.38,24.89.84,9.53,3.26,18.07,9.21,28.6,5.78,10.25,12.44,18.83,19.68,28.1,4.24,5.42,8.19,10.6,11.91,15.08C281.19,492.49,286.56,497.9,291.36,499.25Z"/>
                        <path class="cls-37" d="M681.58,356.28c-5.65,2.32-33.15,11.67-45.15,19.25-4.93,3.09-7.13-.76-6.75-3.29,0,0,1.27-13.32,2.55-17.49,2.58-8.36,1.21-2.84,28.5-27.33a51.55,51.55,0,0,1-13.8,3.23,149.87,149.87,0,0,0-13.78,10.26c-9.84,8.39-10.68,8.55-13.1,18.26-1,4.08-2.23,7.91-3.47,11.87-1,3.31-2.08,6.69-3,10.39-.09.36-.19.71-.29,1-1.68,5.62-4.34,6.68-10.17,4.16-4.55-2-9.79-6.86-12.39-11.1-9-14.83-11.55-20.5-17.18-36a62.57,62.57,0,0,1-13.14-4.88c7.45,16.83,12,37.14,28.27,56.71,4.92,5.91,7.34,9.66,8.19,21.49.51,7.24-2.45,17.31-7.56,22.45-1.23,1.23-2.47,2.41-3.79,3.53C564.42,456.66,539.72,468,515,479.74c.2,1,.42,2,.64,3,2,9.42,3.72,9.88,12,14.91,3.81,2.32,8.81,1.81,8.89,1.9,7.76-5.13,4.21.38,10.66-3.9,7.1-4.72,13.28-8.85,18.81-12.72A243.05,243.05,0,0,0,586.8,466.9c3.47-3,6.77-6.17,10.1-9.6q2.65-2.74,4.92-5.42a119.71,119.71,0,0,0,8.85-11.58c3.93-6,5.07-6.49,6-14.72.63-5.59.68-11.25.9-16.87.28-7.42,5.39-13,11.53-17.23,10.14-6.93,20.7-14,31.7-19.54a103.72,103.72,0,0,1,20.49-7.89A21.14,21.14,0,0,1,681.58,356.28Zm-65,43.1c-2.69,4.81-2.37,9.9-2,17.4.19,4.17.52,7.94-.06,11.44-.56,3.33-3.53,7.75-5.68,10.45-5.77,7.18-8.86,12.19-16,18.4-1.94,1.7-5.41,5.08-7.61,6.42-4.86,3-5.39.72-5.72-.83-1.2-5.48,1.92-8.59,5.36-11.67s7.61-6.63,10.7-10c8-8.83,11.36-14.07,11.83-22.92s-3.82-18.17-10.26-25.32c5.58,2.67,11.93,3.51,16.19.39,3-2.18,4.35-5.91,6.92-8.58s9.45-2.09,11.13,1.2C625.44,390.22,619.57,394,616.58,399.38Z"/>
                        <path class="cls-37" d="M613.26,382.47c.25,4.12-3.54,8.11-7.78,8.53-4.71.46-8.78-2.94-11.67-6.67-5.85-7.53-7.14-7.75-7.88-5.92-.68,1.67,0,4.62,2.61,8,6.28,8,11.9,12.75,13.23,28.17.88,10.16-.16,14.7-14.08,27.06-7.41,6.57-15.42,10-21.35,15.77-6.24,6.1-8.87,17.28-2.78,23.53a21.27,21.27,0,0,0,2.4,2c-5.53,3.87-11.71,8-18.81,12.72-6.45,4.28.06-5.46-7.7-.33-.08-.08-9,.53-9.1.43-5-8.24-12.68-3.59-14.7-13-.22-1-.44-2-.64-3,24.71-11.77,49.41-23.08,70.48-40.9,1.32-1.12,2.56-2.3,3.79-3.53,5.11-5.14,8.07-15.21,7.56-22.45-.85-11.83-3.27-15.58-8.19-21.49-16.23-19.57-20.82-39.88-28.27-56.71a62.57,62.57,0,0,0,13.14,4.88c5.63,15.49,8.14,21.16,17.18,36,2.6,4.24,7.84,9.14,12.39,11.1C608.92,389.15,611.58,388.09,613.26,382.47Z"/>
                        <path class="cls-39" d="M681.29,364.05a103.72,103.72,0,0,0-20.49,7.89A40.16,40.16,0,0,0,640,377.16c-2.28,1.31-3.67,3.31-6.31,2.79a41.58,41.58,0,0,0-10.17-.37c2.43-5.83,2.51-11.71,3.53-16.25A24.83,24.83,0,0,0,616.58,371c1.24-4,2.46-7.79,3.47-11.87,2.42-9.71,3.26-9.87,13.1-18.26a149.87,149.87,0,0,1,13.78-10.26,51.55,51.55,0,0,0,13.8-3.23c-27.29,24.49-25.92,19-28.5,27.33-1.28,4.17-2.55,17.49-2.55,17.49-.38,2.53,1.82,6.38,6.75,3.29,12-7.58,39.5-16.93,45.15-19.25A21.14,21.14,0,0,0,681.29,364.05Z"/>
                        <g class="cls-40">
                        <path class="cls-41" d="M233.4,443.46l0,.05c.08,0,.06-.09.08-.14s.09,0,.15,0,.17.24.13.36h.08c0,.17.22.34.19.51,0,0,0,0,.05,0a8.38,8.38,0,0,1,.41.91s.07,0,0,.05.06.05.11.11,0,0-.06,0,.15.19.21.29,0,0,0,.05.06,0,0,.06.11.11.06.13h0c0,.06.08.12.05.19s.13.12.09.17.11.07.05.1.07,0,0,0,0,.05.09.13,0,0,0,0,0,.31.12.43c0-.08-.06-.18,0-.25s.07.1.05.12,0,.07.07.05,0,.11,0,.07.06.09,0,.12c.14.07.06.26.18.26s.08.1,0,.15.07.1.14.21,0,0,0,.05c.13,0,.07.15.15.19a.3.3,0,0,0,0,.11s0,0-.05,0,.15.15.19.22,0,.05,0,.08,0,.06,0,.07c.11.05.15.26.08.32l0,0s0,.07-.07.1l0,0a.21.21,0,0,0-.15.14l0-.05c0,.06-.19.07-.22.14s-.08,0-.12,0-.05,0-.06-.06,0,0,0-.06-.08-.12-.06-.13-.1-.2-.19-.25,0,0,0-.07l.05,0-.11-.08a.07.07,0,0,0,0-.08.08.08,0,0,0-.07,0,.06.06,0,0,1,0-.07s-.08,0,0-.08l-.07,0a.83.83,0,0,0-.13-.24s0,0,.06,0-.06-.09-.09-.07a.15.15,0,0,0-.07-.14c0-.05-.08-.15,0-.2s0,0-.07-.08.14.15.26.11,0,0,0,0-.07-.05-.12,0,0,0,0,0-.06-.08-.11-.07.05.06,0,.06,0-.08-.09,0,0,.08.06.12-.09-.13-.12-.18,0,.05,0,0,0-.07-.07-.06.05,0,.06,0,0-.15-.08-.23,0,.11.06.16l0,0c0-.07-.07,0-.1-.07l0,0s-.08,0,0,0c-.1-.06-.13-.24-.17-.33s0,0-.07,0a1.44,1.44,0,0,1-.12-.32s0,0,0,0,0-.14-.08-.16,0-.05,0-.08,0-.07,0-.1,0,0-.06,0a.23.23,0,0,0-.1-.2s0,0,0-.08-.07-.08-.12,0,0-.07,0-.1-.08,0-.11,0,0-.06,0-.09,0-.05,0-.09,0,0,0,0,0-.05-.08-.14,0,0,.07-.06,0,0-.06,0-.06-.07,0-.14,0,0-.06,0,0-.07,0-.09-.06-.08-.1-.09a.08.08,0,0,1,0-.08c0-.06-.09,0,0-.06s0,0-.08,0a.09.09,0,0,1,0-.1s-.05-.09-.1-.08a.08.08,0,0,0-.05-.11s0-.05,0-.08,0,0-.05,0-.16-.2-.13-.3-.05-.15-.11-.16,0-.07,0-.12,0,0,.08,0,.1,0,.12,0a.38.38,0,0,1,.16-.12s0,0,0,0,.05,0,.08-.07,0,0,0,.06S233.32,443.48,233.4,443.46Zm.07.87c0,.05.05.17.11.15S233.52,444.32,233.47,444.33Zm.55.39c-.07-.07-.12-.23-.22-.24s.09.12.09.16S234,444.75,234,444.72Zm-.12.7s0,.15.09.13S234,445.4,233.9,445.42Zm.19.83h0Zm.07,0,0,0-.08-.16c-.05,0,0,.1,0,.15S234.15,446.23,234.16,446.24Zm.11-.39s0,.06,0,.09S234.33,445.83,234.27,445.85Zm0,.57s0,.13.08.1S234.33,446.4,234.28,446.42Zm.11-.06s0-.07,0,0,0,.09,0,.14,0,0,.08,0,0-.22-.09-.24,0,0,0,0S234.42,446.34,234.39,446.36Zm.07.2,0,.09C234.55,446.64,234.49,446.53,234.46,446.56Zm.11.29c.07,0,0-.07,0-.09s0,.17.14.18,0,.1,0,.14,0-.09,0-.14,0,.08.06.11,0,0,0-.07a.49.49,0,0,1-.22-.26c-.07,0,0,0,0,0s0,0,0,.05Zm.26-1a.14.14,0,0,1,0-.13s0,0,0,0S234.78,445.88,234.83,445.85Zm-.06.92c0,.05.07.2.13.19S234.84,446.76,234.77,446.77Zm0-.81s0,.1.07.07S234.86,445.93,234.82,446Zm.15,1.35s0,0,0,0,0,0-.06,0S235,447.25,235,447.31Zm0-.89-.06,0c0,.05,0,.08.1.05Zm0,.09c-.05,0,0,.12.07.11A.41.41,0,0,1,235,446.51Zm0,1,0,0,0,0A.06.06,0,0,0,235,447.52Zm0-.18c0,.06,0,.07.08.07S235,447.33,235,447.34Zm0,.28c-.05,0,0,0,0,.05s0,0,.05,0S235,447.67,235,447.62Zm0-.75,0,.06S235,446.83,235,446.87Zm.12,0s0-.2,0-.19,0,0,0,0S235.09,446.83,235.11,446.91Zm0-.47-.05-.1h0l0,.1Zm-.07.93,0,.06S235.11,447.34,235.08,447.37Zm.1.5s0,0,0,.06,0,0,.05,0S235.19,447.93,235.18,447.87Zm.14-.33s-.06-.08-.12,0,.08,0,.11.1l.08,0c0-.05,0-.18-.09-.17s0,0,0,0S235.34,447.52,235.32,447.54Zm0,.28a.16.16,0,0,0,.13.08c0-.06,0-.19-.1-.18s.12.09.07.14S235.33,447.8,235.28,447.82Zm.08-.23c.1.11,0,.3.17.3s-.1-.16-.08-.21,0,0,.06,0S235.42,447.57,235.36,447.59Zm.35.56s0,0,.06,0,0,0,0-.07-.07,0-.08-.1,0,0,0,0-.1,0-.12-.09l0,0c.08.07,0,.12.14.22s0-.05,0-.05-.07,0,0-.07l.13.05S235.69,448.13,235.71,448.15Zm-.16-.43s0,.07.1,0S235.59,447.7,235.55,447.72Zm.11.45,0,0a.25.25,0,0,0,.17.14C235.75,448.23,235.63,448.26,235.66,448.17Zm.18-.28c0-.06-.08-.06-.13-.06s.07,0,.07.09Zm0,.57,0,.07S235.87,448.43,235.84,448.46Z"/>
                        <path class="cls-41" d="M239.9,445.16a.08.08,0,0,0,0,.11s0,0,0,.06,0,.05-.06.06.05,0,.06.07a.18.18,0,0,0,0,.16c-.08,0,0,.1-.05.12s-.17-.08-.24-.16.06.09.1.08.11.09.17.13-.07.12-.12.17.05,0,.05,0,0,.08-.05.11c0-.15-.23-.12-.3-.26,0,.16.22.12.28.3s-.1.07-.05.13l-.11.06c0,.05.05,0,.06,0s-.07,0-.06.09,0,0-.07,0,0,0,0,.07-.18.07-.13.14-.09,0-.05.1-.07,0-.12,0,0,0,0,.06-.14,0-.12.09-.15.14-.26.14,0,0,0,.07-.1.16-.21.11-.2.1-.19.18a.85.85,0,0,0-.25-.13.43.43,0,0,0,.2.14s-.06.08-.13,0,0,.06,0,.08c-.05-.13-.13-.15-.18-.28s.07.07.13,0-.08,0-.11-.09,0,.05-.06.07,0-.06,0-.08-.06,0-.09,0a1,1,0,0,1,.25.42c-.06,0-.1.05-.14,0l.07,0s0,0,0,0,0,.06-.05.07a.12.12,0,0,0-.18,0c.07.06.17.06.24.11-.1.05-.1,0-.18.09a.69.69,0,0,0-.19-.1c0,.07.08.06.12.07s0,.08,0,.1l-.05-.09s0,.05,0,.09-.2,0-.27,0a2.23,2.23,0,0,0-.2-.32s0,0,0,0,0,0,0-.06.08,0,.07-.05-.13.08-.16,0c0,.13.21.21.17.33s.05,0,.07.09-.21,0-.25.07-.06,0-.08,0,0,0-.06.06-.07,0-.12,0-.07,0-.09-.05,0,0,0,.05c-.05-.22-.36-.14-.49-.37.12,0,.22.15.35.11s0,0,0,0,0,0,.06,0c-.14-.13-.33-.09-.46-.24.07.05,0-.05,0-.05s.21,0,.24-.1.06,0,.07,0,0-.07,0-.09l0,.06c.05-.08.11-.06.19-.13s0,0,0,.05.05,0,.08-.07.07,0,.11.06,0,0,0,0,0-.07,0-.08,0,0,0,.06.06-.05,0-.08.12,0,.14,0l0,.06c0-.06.08-.1.16-.14s0,0,.06,0,0-.07.07-.1l0,.05c.08,0,.11-.07.11-.12s.07-.07.11,0,.08-.06.09-.11,0,0,0,.06a.06.06,0,0,0,0-.07l.08,0s0-.06,0-.07.11-.13.2-.11-.05,0-.05,0,.09-.05.15,0,.12-.15.12-.24.14-.09.12-.15c.21-.08.08-.27.22-.36-.05-.06,0-.09,0-.14s0-.13.08-.16c-.08,0,0-.07-.08-.14l.06,0c0-.05,0-.09,0-.13s-.08-.07,0-.11-.16-.14-.16-.24,0,0,0,.05-.09,0-.13-.07,0,.05,0,.05,0,0,0-.05,0,0,0,0-.08,0-.14.08c0-.11-.17,0-.27,0a1,1,0,0,0-.19-.17c0,.09.08.09.11.16-.13,0-.29.1-.39,0s0,.07-.06.08l0-.08a.54.54,0,0,1-.42.06c0,.06-.05,0-.1.05s-.06,0-.11,0l-.06-.12h-.06c0,.07.09.06.1.14s-.2.07-.28,0,0,0,0,0-.12,0-.17,0,0,.05,0,.05,0,0,0,0-.11,0-.16-.05,0,0,0,.05-.24-.06-.28,0a.2.2,0,0,0-.22-.15c-.09-.1-.3-.16-.3-.33-.1,0-.06-.18-.14-.2s0-.08,0-.12.13.15.2.18a.39.39,0,0,0-.21-.24s0-.06,0-.08,0-.06,0-.11a.22.22,0,0,1,0-.2s0,0,0-.05,0,0,0-.06,0,0-.07-.08,0-.21.07-.31,0,0,0,0,0-.1.1-.12c-.08-.12.14-.16.07-.28a.23.23,0,0,0,.18-.15s0,0,0,0a1.33,1.33,0,0,1,.14-.19h0c0,.08.12.13.16.24l.05,0c-.06-.09-.2-.17-.19-.29s.08,0,0-.05,0,0,.05,0,.08-.07.11-.06,0-.09.09-.12l0,.06s0,0,0-.06.13-.09.17-.06,0,0,0-.07.06,0,.07,0,.07-.05,0-.09.2-.13.32-.14.14-.06.13-.12.07,0,.1-.05,0,0,0,0,0-.05,0-.08.06,0,.07,0,.08-.08.1-.11l.07,0s0,0,0-.06,0,0,.06-.05.13-.11.22-.07a.18.18,0,0,0,.21.15s0,.06,0,.08,0,0,.05,0,.15.13.22.21a.07.07,0,0,1-.09,0c0,.06-.1.08-.11.12s-.17-.27-.28-.31.06.14.09.12.13.18,0,.27c0-.07,0,0-.06,0s-.11-.22-.22-.18l0-.08c0,.14.15.22.21.29a0,0,0,0,0,0,0c-.11,0-.15.1-.31.17s0-.08-.05-.06,0,.1,0,.13l-.08-.14s0,0-.06,0,0,0,.06.06l0,0c0-.07-.07,0-.09-.11,0,.13.13.14.2.2s0,0-.13.07-.06-.12-.11-.2.06.15.08.22-.07,0-.1,0,0,0,0,.06-.12.09-.19.13l0-.08-.06,0s.06,0,.06,0a.05.05,0,0,1,0,.07.35.35,0,0,0-.11-.15.33.33,0,0,0,0,.18s-.06,0-.09,0,0-.13-.08-.12,0,.09.06.13,0-.05-.07,0,.1.09.07.17-.11.08-.18.09l-.05-.1c-.07,0,0,.05-.08.07s-.08-.06-.11-.15c0,.13.14.16.18.25s-.05.09,0,.14,0,0-.05,0,0,0,0,.05-.14.12-.13.2-.1.09-.07.16,0,.07-.09.08,0,0,0,0-.06,0,0,.06,0,0-.08,0,0,.27.14.26,0,0,0,.05.08,0,.09.07.18,0,.2,0,.06,0,.08.07,0-.05.07-.06,0,0,0,0,.13,0,.19,0,0,0,0,0l0,0c.06,0,0-.07,0-.08s.06,0,.09.06,0,0,0-.05.07,0,.08.05,0,0,0-.05l0,.05c.06-.06.17,0,.16-.06s.12,0,.16.06.16,0,.26-.08l0,.05c.08,0,.09,0,.13-.07,0,.11.12.06.19,0s.09,0,.17,0l0,0s0,0,0,0,.15,0,.2,0,.19,0,.29,0,0,0,0,0a.21.21,0,0,0,.19,0s.05,0,.06.06l.12-.07c0,.08.13,0,.18.09l.06,0c.06,0,.08.1.15.08a.23.23,0,0,0,.13.14c0,.06,0,.05,0,.1s-.06,0-.09,0,0,.06.08,0,0,.07,0,.11h0c0-.07-.06-.14,0-.18a4.12,4.12,0,0,0,.46.6l0,0c0,.05.06.14.1.16s0-.09-.06-.13S239.85,445.21,239.9,445.16Zm-4.52-1.5s0,0-.07-.07l-.05,0S235.33,443.68,235.38,443.66Zm.12-.76s0-.09-.06-.06S235.47,442.94,235.5,442.9Zm0,1.26s0,.07,0,.11l0,0S235.53,444.13,235.49,444.16Zm.09.22s0-.1,0-.07Zm0-1.33,0,0s-.06-.08-.1-.08Zm0,1.38a.62.62,0,0,1,.08.12s0-.09,0-.14Zm.1.16s0,.13.07.13S235.75,444.57,235.69,444.59Zm.05-1.45,0,0a.85.85,0,0,1,.11.16C235.88,443.27,235.77,443.2,235.74,443.14Zm0,0s.05,0,0,0,0,0-.05,0l0,0S235.75,443.1,235.76,443.13Zm.05,1.77s0,.1.06.06S235.85,444.87,235.81,444.9ZM236,443l0-.06S236.08,443,236,443Zm.18-.51s0-.07,0-.11l-.05,0Zm.53,5.15c0-.05,0,0-.06-.09s-.17,0-.26,0C236.5,447.63,236.63,447.61,236.73,447.66Zm-.29.27a.07.07,0,0,1,0-.09c0,.06.06.08.09.12S236.48,447.93,236.44,447.93Zm.23-3.33s0,0,0,0,0,0,0,0,0-.16-.1-.14a2.3,2.3,0,0,0,.12.23s0-.1.05,0S236.66,444.63,236.67,444.6Zm0,3.5c-.05,0-.11,0-.15-.06S236.63,448.08,236.68,448.1Zm.15-.06c-.05,0-.07,0-.1,0s-.1-.09-.14-.14A.37.37,0,0,1,236.83,448Zm-.06-.24,0,0s.09,0,.12.09,0,0,.07,0a.21.21,0,0,1-.09-.11S236.8,447.76,236.77,447.8Zm.15-.08s-.07,0-.09-.05-.05,0-.08,0S236.88,447.79,236.92,447.72Zm.28-.34s0,.1,0,.11S237.24,447.42,237.2,447.38Zm.25-.1a.08.08,0,0,0-.08,0s0,0,0,.07,0,0,0,0,0,.07,0,.1.08,0,.11,0,0-.09-.09-.09S237.38,447.3,237.45,447.28Zm.51-.11c-.07,0-.11-.06-.17-.07l-.06,0c0,.09.11,0,.15.11S237.93,447.2,238,447.17Zm-.13-.21c-.05.07.06.2.13.17A.25.25,0,0,0,237.83,447Zm.34.65c-.07,0-.1-.23-.2-.23s.1.05.08.11-.08-.09-.12-.08A.31.31,0,0,0,238.17,447.61Zm1.18-1,0,.06C239.43,446.72,239.38,446.62,239.35,446.65Zm.2-2s0,0,.09,0,0,0,0,.05S239.56,444.68,239.55,444.64Zm.21.44s-.13-.11-.14-.11,0,.11.08.12S239.73,445.12,239.76,445.08Zm-.07-.29c0-.06-.05,0-.06-.07S239.75,444.76,239.69,444.79Z"/>
                        <path class="cls-41" d="M244.37,443.82c0,.08.06.11.08.22-.21.14-.37.19-.48.37-.11,0-.2.11-.31.13s0,0,0,0-.22-.31-.38-.33-.06-.15-.15-.09,0-.1-.07-.06,0,0,0-.09a.7.7,0,0,0-.36.16c-.08-.12-.13-.38-.23-.49s.15-.09.2-.06c0-.21-.14-.14-.14-.35-.06,0-.18-.11-.13-.2l-.12,0s0-.06,0-.07-.08-.15-.15-.12-.1-.12-.07-.22,0,0-.08,0-.07-.29-.17-.23.05-.07.06-.11l-.08-.15c-.06,0,0,.12,0,.17l-.06,0a.11.11,0,0,0,0-.13s0,0-.07,0-.07-.09-.06-.2a0,0,0,0,0,0,0s-.06-.08,0-.09,0-.17-.15-.13,0-.16-.07-.13,0-.06,0-.08a.21.21,0,0,0-.14-.1c0-.06,0,0,0-.08s.05-.05,0-.1-.06,0-.09.06,0-.1,0-.14h-.07c0-.12-.06-.1-.08-.21s0,0-.05.05,0-.18-.07-.2,0,0-.05,0a.28.28,0,0,0-.15-.29l.06,0a.09.09,0,0,0-.12,0c0-.12,0-.09,0-.15s0,.07,0,0a.24.24,0,0,1-.25.16s0,.09-.09.06-.14,0-.21.08-.05.08-.08.06-.08,0-.13.09a1.18,1.18,0,0,1-.28-.31c-.15.12.28.32.23.47s0,0,0,0,0,.16.09.18,0,.13,0,.18,0,.05-.05.06l.07.14s-.07,0-.1,0,.21.13.16.25.07.13.12.15,0-.08,0-.11.08.15.16.13-.05.05,0,.09,0,0-.06,0a2.79,2.79,0,0,0,.34.91.9.9,0,0,0-.14-.37c.07,0,0-.05.08-.07s0,.14.11.22l0,0c0,.06,0,0,.06.06a.2.2,0,0,0,0,.17s0-.08,0-.1,0,.09.09.1c-.1,0-.14.14-.06.17s-.06-.08,0-.09a.33.33,0,0,1,.12.33c.06,0,0-.07.06-.08a3.42,3.42,0,0,1,.21.66.12.12,0,0,1,.08.06.08.08,0,0,1,.06.05h0l0-.06s-.05.06,0,.18l0,0c0,.06.1.05.07.13s0-.06.06,0,0-.06,0-.07,0,0,0,0,.13-.05.1-.11,0,0,.08,0,.07-.17.13-.07a1.84,1.84,0,0,1,.22-.17c.05,0,.07.17.08.2s0,0,0,0-.08-.18-.09-.2l.2-.05s0,0,0-.05a.84.84,0,0,0,.21-.11s0,0,0,0,.09,0,.12-.1c0,.11.14.33.12.41s.06,0,.07.07-.1.1-.16.15-.06,0-.1,0,0,0,0,.06,0,0-.06,0,0,0,0,.06a.23.23,0,0,1-.14,0s0,0,0,.06l-.12.06,0-.05a.48.48,0,0,1-.36.2.06.06,0,0,0,0,.1s0,0-.06,0-.09.07-.08.11,0,0,0-.05,0,0,0,.05.06.06.09.08l-.06,0,0,.07h0c0,.06.1.09,0,.15s.08-.05.09,0l-.07,0c.11.07.08.2.18.26s0,.07,0,.11a.36.36,0,0,0-.18.1c-.1,0-.14-.25-.23-.33,0,.11.11.24.13.35s0,.05-.08.08-.09,0-.11,0a.07.07,0,0,0-.1,0s0,0,0,.06-.16,0-.19.1,0,0-.07,0-.1-.17-.1-.31,0-.06-.06-.08,0-.05,0-.05c-.08-.17-.11-.37-.23-.47s0-.18-.07-.2,0-.32-.12-.38c.05,0,0-.09,0-.12a0,0,0,0,1,0-.07s0,0-.06,0,0-.05,0-.08,0,0-.06,0l.06,0s-.08,0,0-.07,0,0-.05,0a.76.76,0,0,0-.1-.41c0-.2-.24-.36-.19-.59,0,0-.06,0-.08-.07s0-.05,0-.07-.08,0-.11-.06,0-.05.09-.07,0-.08-.11-.12-.07-.11,0-.13-.07,0-.08,0,0-.05,0-.08a.48.48,0,0,0-.14-.4l.06,0c-.1-.06,0-.28-.18-.33l.05,0c-.1-.09-.05-.32-.2-.37l.06,0s0,0-.06,0,.05,0,.05-.05,0-.17-.17-.24l.06,0c0-.06-.09-.14,0-.18-.12-.09-.09-.22-.22-.4,0,0,0-.08.06-.11s0,0-.07,0,0-.05,0-.11.17-.06.26-.11l0,0s0-.08.08,0,0-.07,0-.1,0-.06,0,0h0s.08-.1.12-.07a.74.74,0,0,1,.4-.14c0-.09.22-.07.32-.19s0,0,0,.09,0-.07,0-.08.25-.09.44-.14c0,.05,0,.08,0,.11s0,0,.07,0,.14.1.09.17,0,0,0,0,0,.06,0,.09.08.09.15.16.07,0,.09,0,0,0,0,0,.18.08.12.15,0,0,.06,0a1.08,1.08,0,0,0,.16.23s0,.05,0,.07.06,0,.08,0,.08.25.18.18.05.07.08.09,0,.07,0,.1,0,0,.07,0,.07.14.17.24c-.05.05,0,0-.07,0,.13.07.22.23.35.32s0,0,0,.08.17.2.29.35.06,0,.1,0,0,0,0,.05.16,0,.11.14l.08,0c0,.07,0,.17.13.19s0,0,0,.05.05.09.12,0c0,.1.08.25.22.28a1,1,0,0,0,.29.37l-.06,0c0,.05.13,0,.07.06h.11c0,.06,0,.05,0,.08s.15.27.24.31.11.14.17.18.1.07,0,.14C244.27,443.71,244.29,443.82,244.37,443.82Zm-5.07-3.52a.15.15,0,0,0,.08.09c-.07,0,0,.16.07.2a.08.08,0,0,1,0-.11C239.42,440.39,239.38,440.29,239.3,440.3Zm.61,1.53.06,0s0,.07,0,.09Zm.27.51a.22.22,0,0,0,.12.23c-.05,0,0,.05,0,.06s-.07-.13-.13-.24S240.12,442.35,240.18,442.34Zm.06,1.3c-.09,0,0-.14-.08-.22a.51.51,0,0,0,.05.31C240.28,443.72,240.17,443.66,240.24,443.64Zm.3-.06h-.06c-.06-.06,0-.08,0-.14s0,.12,0,.19.07.07.12,0,0-.19-.08-.3C240.45,443.42,240.55,443.51,240.54,443.58Zm-.08.78a.52.52,0,0,0,.15.27l-.07,0s0,.11.07.09,0,0,0-.06l.06,0c0,.05,0,.11,0,.17C240.75,444.71,240.53,444.43,240.46,444.36Zm.26.79s.06.18.12.15S240.78,445.12,240.72,445.15Zm.05.58-.05,0,.13.24C240.9,445.93,240.81,445.83,240.77,445.73Zm0-5.2a.1.1,0,0,0,0,.12S240.79,440.57,240.79,440.53Zm0,3.64-.05,0c.05.06,0,0,.06.13S240.87,444.22,240.83,444.17Zm0,1.22.2.38A.51.51,0,0,0,240.81,445.39Zm.19-1.15a.13.13,0,0,0,.07.09c0,.07-.09,0-.11-.07s0,0,0,0l0,0S241,444.25,241,444.24Zm0,.62a1.44,1.44,0,0,0,.17.52A1,1,0,0,0,241,444.86Zm0-3.9s0,.15.1.12S241.09,440.93,241,441Zm0-.06a.46.46,0,0,1,.15.2C241.26,441,241.14,440.88,241.07,440.9Zm.35.49.12.25C241.56,441.56,241.53,441.38,241.42,441.39Zm0,3.71s0,0,0,0A.08.08,0,0,0,241.44,445.1Zm.25-4.14-.08-.14c-.08.07-.09,0-.17,0A.8.8,0,0,1,241.69,441Zm0,.16c0,.05.16,0,.12.08s0,0,.05,0a1.64,1.64,0,0,1-.14-.22S241.78,441.09,241.7,441.12Zm.39.35a.27.27,0,0,1-.06-.17c-.05,0-.08-.05-.14,0s.12,0,0,.07C242,441.32,242,441.49,242.09,441.47Zm-.15,3.06c.06,0,0-.11,0-.06Zm.12-.06c.06,0,0-.15,0-.13S242,444.42,242.06,444.47Zm0-2.63a1.18,1.18,0,0,1,.11.35A.31.31,0,0,0,242.08,441.84Zm0-.09.21.4A.65.65,0,0,0,242.11,441.75Zm.08-.1,0,.08.06,0C242.27,441.64,242.23,441.64,242.19,441.65Zm.05.63s0,.1.07.06S242.28,442.24,242.24,442.28Zm.07,1.49h0Zm0,0a2.26,2.26,0,0,1,.31.44l-.1,0C242.47,444.1,242.43,443.87,242.35,443.75Zm.11-.09v0Zm.88-.7s0,0,0,.05.06.09.11.07S243.44,442.93,243.34,443Zm.06,0s0,.15.1.12S243.46,442.89,243.4,442.92Zm.18,1c-.09.12,0,.28,0,.42C243.69,444.22,243.55,444.05,243.58,443.92Zm.18.17.05.09C243.87,444.17,243.8,444.05,243.76,444.09Z"/>
                        <path class="cls-41" d="M239.66,451.49l-.17-.27-.06,0c.14.06.11.24.1.33s-.07,0-.1,0a.28.28,0,0,1-.28.13c0,.05.07,0,.07.08l-.09.06,0-.06c0,.06-.05.07-.11,0,0,.11-.18.07-.24.2s.13.17.09.24l.18.1c-.07,0,0,.07,0,.11s-.06-.07-.1,0a1,1,0,0,0,.1.34.24.24,0,0,0-.05-.23.33.33,0,0,1,.21.34s.06,0,.1,0,.07.13,0,.18.09,0,.06.08,0,0,.08,0,0,.13,0,.21h0s0-.06,0-.07a.58.58,0,0,0,.22.42c-.09,0,0,.08-.08.1s.1.09.16.12,0,.05-.05.07a2.23,2.23,0,0,1,.33.52c-.24-.19-.43-.62-.66-.85l0,0a2.51,2.51,0,0,0,.72.89c-.06.07.12.19.07.25s0,0-.08,0c.35.53.3,1.05.56,1.52-.09-.33-.2-.67-.28-1a8.74,8.74,0,0,1,.69,1c-.07.06-.12,0-.19.09s0,0,.06,0-.2.12-.33.09,0,.1-.11.11c-.28-.41-.15-.73-.43-1.16.13.39.21.78.34,1.18-.07,0-.07,0-.11.07s0-.09,0-.1-.1-.08-.16-.13,0-.06,0-.09-.12-.18-.19-.17,0-.11,0-.16c-.16-.1-.12-.34-.25-.52-.05.06,0,.14.07.23l-.06,0c0-.09-.08-.31-.19-.31,0-.16-.2-.27-.25-.55-.06,0-.09-.14-.16-.11-.09-.21-.23-.45-.38-.76,0,0,0,0,0,.06a1.46,1.46,0,0,0-.25-.33c.05,0,0-.06,0-.08-.17,0-.11-.22-.25-.26.08,0,0-.08,0-.1a.08.08,0,0,1-.05-.11s-.05,0-.07,0,0-.12-.08-.14c.08-.06-.17-.22-.09-.28s-.12-.16-.2-.18-.06-.14,0-.18-.09,0-.12-.07,0-.18-.1-.16-.07-.13-.16-.18l.07,0,0-.07s-.05,0-.07,0,0-.06,0-.07-.1-.06-.14-.08,0-.05,0-.08c-.16-.32-.31-.49-.51-.86l.07,0c-.14,0,0,0-.14,0s0-.07,0-.1l.06,0c-.15,0-.12-.17-.26-.28l.06,0c-.05-.07-.11-.06-.1-.16s-.06,0-.07,0,0-.06,0-.07-.14-.26-.29-.39c.05,0,0-.06,0-.1s-.07,0-.09-.06,0,0,0,0a3.61,3.61,0,0,1,.56-.36c.06.13.15.15.22.25,0-.12-.16-.13-.18-.28.16-.11.3-.16.41-.25s0,0,0,0,0,0,.06,0,0-.06,0-.08c.25,0,.48-.36.73-.36.16-.18.43-.21.51-.36,0,.08.12,0,.17-.06l0,.07c.12,0,0-.09,0-.13s.23,0,.34-.07l0,.07c.07,0,0-.07.05-.08s.08,0,.12,0,.26,0,.39,0a.51.51,0,0,0,.33.11c0,.07.1.11.15.1s0,.15.11.12.1.14.17.2,0,.09,0,.13.1.08.15.1,0,.07,0,.08l-.08-.13c0,.1,0,.29.12.33,0,0,0,.08,0,.11s0,0,.09,0c0,.12.13.15.13.29s0,0,.08,0,0,.13.08.21c-.13.13-.06.31-.2.43l.06.1c-.07.07-.1,0-.16,0a.25.25,0,0,1,0,.13c0,.06-.06,0-.1,0s0,.11-.06.15a1.93,1.93,0,0,1,.39-.08s0,0,0-.06.07,0,.1,0,0,.06,0,.1a1,1,0,0,1,.07-.15c0,.09.09.05.15,0,.14.15.29.3.44.44,0,.15.09.32.12.46s-.07-.1-.14,0a.1.1,0,0,1,0-.1c-.05-.06-.13.05-.16-.06a.18.18,0,0,1-.25-.06l-.13.08a.51.51,0,0,0-.46,0c-.15-.12-.27-.42-.45-.46a2.88,2.88,0,0,0,.24.45c0,.05-.06-.05-.09-.07l-.05,0s.06.09.07.13a.2.2,0,0,0-.2.12c0-.07-.06-.23-.16-.29s.08.14.1.2-.1.06,0,.11-.16.1-.18.15S239.69,451.48,239.66,451.49Zm-3-1.65c.11.06.1-.11.21,0-.07-.11-.13-.22-.23-.21s0,0-.06-.16c0,0,0-.08-.11,0a3.58,3.58,0,0,0,.24.34s0,0-.07,0S236.61,449.8,236.68,449.84Zm.48.33c-.07.05-.11-.06-.17-.05s-.13-.31-.23-.23.24.09.18.23.09.06.13.08.07.14.1.21.07,0,.12,0S237.25,450.27,237.16,450.17Zm.08.29,0,.07c.08-.08.13,0,.17.09C237.51,450.51,237.32,450.43,237.24,450.46Zm1.89.26.13.21c.08-.06-.14-.2-.07-.27s.29-.15.4-.29c0,0,0,.07.08,0s.11-.12.19-.16a.28.28,0,0,1,.1-.27c-.05-.1,0-.18,0-.27l-.07-.13.07,0c0-.06-.1-.13-.07-.17-.15,0-.08-.17-.23-.15,0,0,0-.07,0-.09a.75.75,0,0,1-.41-.29c-.09.05-.14,0-.14-.1s0,.08-.07.08l-.15-.07c-.06,0,0,.05,0,.06l0-.06c-.09,0-.1.08-.13.13l0-.06c-.24.15-.48.35-.68.45,0,.16-.22.13-.26.3-.05,0-.12,0-.1.06s0-.09,0-.06-.12.07-.08.13-.14.13-.29.14c.15.18.24.34.34.45s-.09,0-.05.07.06,0,.09,0,.11.16.09.25.06-.05.09,0,0,.07,0,.11.1-.07.12,0,0,0-.11,0l.06.1s.06,0,.09,0l0,.09-.07,0c.09.07.21.09.2.23s.05,0,.07,0,0,.06,0,.1.07,0,.12,0S238.9,450.87,239.13,450.72Zm-1.75-.19c0,.07,0,.14,0,.21S237.4,450.61,237.38,450.53Zm.15.23.07.11c.07-.09.07.12.15.06A.35.35,0,0,0,237.53,450.76Zm.25-1.79s-.07-.21-.11-.16S237.7,449,237.78,449Zm0-.17c.05.05.09.1.15.09S237.81,448.79,237.75,448.8Zm.43,2.63a.3.3,0,0,0-.22-.16,1,1,0,0,0,.32.61,2,2,0,0,1-.26-.53C238.09,451.36,238.12,451.44,238.18,451.43Zm-.24-2.88c.05.07.11.06.16.18.05-.05,0-.11,0-.17S238,448.52,237.94,448.55Zm.43,3.46.47.77A2,2,0,0,0,238.37,452Zm.37,2.09-.05-.11S238.72,454.06,238.74,454.1Zm.14,0,0,0-.09-.13,0,0Zm.23-1.1c-.05,0-.07,0-.13,0s.16,0,.14.1,0-.11-.09,0,.23.2.22.35c.05,0,.08.11.13,0A3.38,3.38,0,0,0,239.11,453.05Zm.12,1.22c.09.1.07.19.09.29C239.37,454.5,239.34,454.28,239.23,454.27Zm-.19-3.33c.06.05,0,.07,0,.11l.06,0S239.09,450.88,239,450.94Zm.07.24c.07.07,0,.1,0,.15S239.19,451.15,239.11,451.18Zm.23,3.41s0,.13.09.07S239.39,454.53,239.34,454.59Zm.28.06a.7.7,0,0,0-.28-.32C239.43,454.45,239.49,454.7,239.62,454.65Zm-.17-3.5-.09-.13-.06,0c0,.1.1,0,.09.13Zm.13,3.14c.15.24.11.44.24.68C239.79,454.77,239.77,454.44,239.58,454.29Zm.59,1.77c-.17-.18-.18-.37-.39-.46C239.91,455.79,240,456,240.17,456.06Zm-.23-.76.05.09C240.06,455.38,240,455.24,239.94,455.3Zm.13-.64c-.06-.05-.09-.22-.17-.19S240,454.69,240.07,454.66Zm.1,1,.19.31C240.39,455.91,240.23,455.67,240.17,455.67Zm.11-.58c-.05,0,0-.08,0-.1s.19.24.27.42C240.45,455.42,240.41,455.07,240.28,455.09Zm.16,0-.05-.08C240.42,455,240.5,455.1,240.44,455.11Zm0-4c-.13.05-.18-.18-.26-.28C240.26,450.82,240.32,451,240.41,451.13Zm-.2-1.31.08.13s.05,0,.07,0S240.27,449.81,240.21,449.82Zm.46,5.81c.06-.05.08.09.12.12S240.71,455.66,240.67,455.63Zm-.32-5.65.05.07.07,0A.1.1,0,0,0,240.35,450Zm.74,6.32-.31-.5c0-.05,0,.05.08,0C240.83,456,241.12,456.16,241.09,456.3Zm.58-.52a.23.23,0,0,1,.12.12s-.15.06-.11.12,0,0-.08,0-.2.17-.27.1c0,.1-.12,0-.13.11s0,0,0,0-.05-.36-.19-.31c0-.05,0-.11-.07-.18s.22-.1.23-.18,0,0,0,.09,0-.08.07-.1a.37.37,0,0,0,.09.21.26.26,0,0,0-.06-.23c.07,0,.12,0,.06-.07s.05.05.1,0c0,.09.06.06.11.08s-.06-.05-.08-.09l.06,0C241.53,455.54,241.71,455.68,241.67,455.78Zm-1.14-6.89-.06,0,0-.06S240.51,448.86,240.53,448.89Zm0,.18-.07-.11S240.63,449.06,240.56,449.07Zm0,.05.06,0a.32.32,0,0,1,.07.25Zm.94,6.24c.08,0,.27.18.24.28C241.66,455.5,241.56,455.52,241.49,455.36Zm.28-.18c.16.21.35.27.5.51-.07,0-.12-.06-.15.05-.12,0-.2-.27-.3-.4,0,.11.17.3.24.44h-.13c0-.17-.23-.28-.31-.51C241.7,455.21,241.75,455.28,241.77,455.18Zm1.11-3.32s0,.16.13.11c0,.16.13.3.22.45l0,0c0,.06.06,0,.07.05a5.88,5.88,0,0,1,.24.89l-.07,0c.11.06.1.14.1.28s0,0-.06,0,.07.14.1.21c-.14.09,0,.25-.19.31s0-.07,0-.13h-.06c0,.12.12.17.18.19s-.06,0-.1,0,0,.06,0,.1a1.22,1.22,0,0,0-.15.17c0-.09-.07-.07-.1-.1s-.16-.46-.29-.39a.1.1,0,0,1,0-.11c-.06,0,0,.06-.05.07s0,0,0-.09,0,0,.07,0a.5.5,0,0,0-.07-.38s0-.05.11-.07a.74.74,0,0,1-.16-.52c0-.09-.07-.09-.11-.12s-.19-.31-.1-.43-.07,0-.08,0,0-.07.08-.1c-.08-.05-.16-.07-.22-.21l.07,0c0-.06-.13-.15-.08-.19s-.08.06-.09,0-.08-.15,0-.22c-.14-.08-.26-.24-.4-.34.11-.11-.18-.32-.07-.42.09.11.08.2.14.31.09-.05,0-.14,0-.19a1.16,1.16,0,0,0,.33.36c-.15-.37-.55-.58-.77-1a6.19,6.19,0,0,1,.95.91c.05.06.08.17.14.19a1.47,1.47,0,0,0-.34-.52c.11,0,.18.14.28.17s.12.09.08.19c.15,0,.13.28.28.26,0,.16.13.22.19.31S242.9,451.87,242.88,451.86Zm-1,3.31c.09,0,.15.11.22.21C242,455.39,241.92,455.29,241.86,455.17Zm-.25-4.73a.2.2,0,0,1,.17,0A.11.11,0,0,1,241.61,450.44Zm.39,4.7a1.61,1.61,0,0,1,.41.38c0,.05,0,0-.09-.06l0,0a.29.29,0,0,0,.13.12C242.24,455.64,242.13,455.32,242,455.14Zm.85-.53a1.15,1.15,0,0,1,.34.3l-.06,0a1.92,1.92,0,0,1-.16-.21c0,.05-.07.1,0,.17s.05,0,.07,0-.06.12,0,.2c-.1,0,0,0-.08.09s0,0-.07,0-.12.09-.09.17a.75.75,0,0,0-.34.21c-.14-.23-.31-.31-.45-.49,0,0,.13,0,.09-.1.13,0,.16-.08.31-.2s0-.06,0-.09c.23,0,.2-.24.37-.36,0,.05,0,.18.09.15S242.94,454.57,242.85,454.61Zm-1-4s-.1-.09,0-.12.09.05.13.14S241.84,450.58,241.8,450.65Zm.65,4.64a.41.41,0,0,0-.29-.16l0,0C242.28,455.17,242.35,455.29,242.45,455.29Zm-.4-4.45.06,0,0,.06C242.1,450.91,242.07,450.9,242.05,450.84Zm.1.65c.22.1.35.58.56.7a2.07,2.07,0,0,0-.56-.81S242.13,451.45,242.15,451.49Zm.63,2.59a.09.09,0,0,1,0,.11l0-.06Zm-.16-2.39,0,0c.14.33.48.7.44,1,.05-.06.06.09.11,0s-.16-.33-.24-.53S242.83,451.77,242.62,451.69Zm.33,2.72c0,.21.4.19.28.4a1.56,1.56,0,0,1-.38-.45c.1,0,.17,0,.25.1S243,454.42,243,454.41Zm0-.12-.07,0c0-.06,0-.1,0-.16S242.91,454.26,243,454.29Zm-.22-2.06.07.11C242.86,452.33,242.77,452.17,242.73,452.23Zm.08.2.07.12,0,0-.08-.12Zm.45,1.24.07.12S243.28,453.63,243.26,453.67Zm0-.45c.07.09,0,.15,0,.22l.08,0C243.32,453.34,243.35,453.24,243.29,453.22Z"/>
                        <path class="cls-41" d="M243.28,451.18s0,0,0,0a6,6,0,0,1,.49.76s0,0,.09,0a3.09,3.09,0,0,0,.39.71c-.08-.57-.75-1-.75-1.44l.1.16c-.08-.25-.29-.43-.43-.81l.1-.05c-.14-.19-.31-.27-.44-.48.12.24.31.5.43.78a.81.81,0,0,1,.15.45c-.1-.26-.43-.51-.37-.67s-.21-.2-.11-.27-.06,0-.08,0c-.09-.19-.32-.3-.31-.51l.12.2c.07-.14-.08-.18-.15-.33.11-.05.14.15.23.2-.09-.27-.33-.41-.48-.62-.06.1.31.28.16.43-.07-.23-.32-.29-.32-.49-.1,0-.09-.11-.14-.09s-.13-.15-.08-.28-.11-.16-.19-.17-.1-.24-.15-.25l.07,0c-.1,0-.11-.16-.12-.2s-.12,0-.15-.11,0,.05.08,0-.09,0-.13-.07l.07,0c-.18-.13-.15-.33-.35-.5a.87.87,0,0,0-.32-.53c0-.05,0-.06,0-.12.32-.09.47-.47.81-.39a.16.16,0,0,0,0-.16c.09.05.31-.08.41-.21s.06,0,.07,0,0-.08,0-.1,0,.15.1.24,0-.1.07-.12l-.08-.13c.09,0,0-.07,0-.11s.07,0,.08,0c0-.12.08-.05.12-.16,0,.08.12-.07.15,0s0-.05,0-.07.11,0,.06-.08.21-.13.27-.07.25-.21.32-.2.13-.1.14-.17a.19.19,0,0,0,.15,0s0-.05,0-.08.24-.12.36-.17a3.3,3.3,0,0,1,.37.61s.05,0,.07,0,0,.13.09.15,0,0,0,.05-.1,0-.05,0c-.13,0-.21.25-.34.16a.55.55,0,0,1-.33.2c0,.12-.19.15-.28.21s.05,0,.07,0a1.87,1.87,0,0,0-.71.47s0,0,0-.07-.09.11-.14.15,0,0-.05,0c-.08-.22-.17-.33-.27-.59-.05.15.12.37.23.58-.06.22-.46.23-.52.44,0,0,0,0,0,0s-.06.07-.06.1.07,0,.09,0c.05.22.37.52.35.69.23.18.27.43.45.63l-.06,0c.2.06.2.41.41.44,0-.12.22-.05.17-.19s.05,0,.1,0a1.3,1.3,0,0,0,.31.51c0-.17-.17-.23-.22-.43s.3-.11.27-.2a.21.21,0,0,0,.22-.14c.11.11.14-.12.27,0a.46.46,0,0,1,.37-.18c0-.06.11-.09.12-.17s.17,0,.18,0l0,.06c.08,0,0-.06,0-.08s.07.06.1.1.09.15,0,.19c.17.08.17.23.37.42,0,0,0,0,0,0s0,0,0,.07-.16,0-.18.15l0-.07c-.08,0,0,.1-.1.07s.05,0,.06,0,0,.08-.06.08l0-.05c0,.06-.19.06-.2.06s0,0,0,.05c-.22-.05-.2-.62-.44-.74a3.42,3.42,0,0,1,.34.85c-.11,0-.1.06-.17.14s-.05-.11-.11-.07,0-.15-.07-.15.13.25-.06.32c0-.05.06-.05,0-.09s0,.06-.11.06,0,.06,0,.1-.23.16-.31.14l-.07-.11c0,.08.08.16,0,.22-.08-.09,0-.14-.09-.22s0,.06,0,.07l.09.14s-.09,0-.06.08-.05.12-.14,0a2.72,2.72,0,0,0,.43.65,1.21,1.21,0,0,0,.38.62,8.61,8.61,0,0,0,.62,1.16s0,.12.08.14a.83.83,0,0,0,.28.46c-.11-.21-.24-.44-.38-.69,0,0,0-.09.1-.11l0,.06a.31.31,0,0,0,.13-.2s.06,0,.11,0c.11.15,0,.19.18.32a.72.72,0,0,0-.14-.34c.12,0,.31-.27.48-.25s0-.09,0,0,.16-.17.21-.08,0-.07,0-.1a.73.73,0,0,0,.28-.17s.06,0,.09,0-.08-.08,0-.09.08,0,.1.1,0-.1,0-.15l.09-.06,0,.07c0-.05,0-.12.11-.07s.11-.06.07-.13a3.92,3.92,0,0,0,.56-.34l0,.07c.07,0-.07-.09,0-.11l.09.15a.14.14,0,0,0,0-.18c.09,0,0-.08.18-.12l.07.12c.07,0,0-.1,0-.13s.1,0,0-.08.11,0,.09-.1c.17.06.24-.14.42-.15-.06.1.19.11.13.23s.07,0,.1,0c0,.15.16.17.13.3a.22.22,0,0,0,.17,0c0,.17.16.12.22.3,0,0-.1,0-.05.07s0,0-.07,0,0,.05,0,.08-.27.19-.36.13,0,.06,0,.1-.22.05-.21.13-.14.06-.19,0,.06.06,0,.08-.2,0-.17.1-.06,0-.1.06,0,0-.05,0,0-.08,0-.1,0,0-.05,0,0,.08,0,.13-.09.12-.2.16-.06,0-.09,0,.06.07,0,.09-.17.09-.25.06-.06.09-.07.13-.07,0-.1,0,0,.09,0,0,0,.12-.12.16-.08,0-.12,0,0-.07,0-.08-.11,0-.09-.09c-.06.05,0,.11,0,.18-.06.22-.38.2-.46.36,0-.07-.06,0-.07-.05s0,.09-.08.05,0,.05,0,.08a.29.29,0,0,0-.25.15s-.08,0-.09-.07,0,.05,0,.08-.05,0-.06-.05,0,.07,0,.11-.16.08-.21,0-.08,0-.1.1,0-.18-.15-.13.12,0,0,.06.07,0,.08.06-.19.14-.29.21a.65.65,0,0,1-.05-.27s-.06,0-.09,0c.15,0,0,.15.11.25a.63.63,0,0,0-.32.19c0-.06-.06,0-.09,0,0-.13-.07-.11,0-.19s-.08,0-.12,0,0-.11,0-.16c-.14-.08-.09-.23-.29-.31a.1.1,0,0,1,0-.11.6.6,0,0,0-.25-.23s.06,0,.07,0a.16.16,0,0,0,0-.18c-.09,0,.07.1,0,.13s-.05-.12,0-.16-.09-.12-.15-.09,0-.21-.12-.19c0-.16-.17-.15-.09-.33,0,0-.07-.07-.13,0a.35.35,0,0,0-.07-.22c-.09,0-.15-.25-.17-.34s0,.05-.06.06c.07-.18-.23-.29-.16-.5-.06,0,0,.06,0,.06s-.12-.07-.07-.17-.05,0-.08,0c0-.14,0-.22-.14-.34l.06,0-.18-.16.06,0c0-.09-.08,0-.1-.11s0,.09.1,0A5.51,5.51,0,0,1,243.28,451.18Zm-1-2.07q-.06-.12-.15-.12l.11.19C242.26,449.17,242.18,449.12,242.24,449.11Zm1.06,1.2s-.08,0-.12,0l0,.07Zm.12,1s0-.09-.07,0,0,0,0,.08Zm.06-1.18c-.1-.09-.07-.31-.15-.31s0,.06,0,.07S243.35,450.16,243.48,450.15Zm0,1.47c.06,0,0-.11,0-.19A.16.16,0,0,0,243.47,451.62Zm.27-2s-.05-.15-.11-.1,0,.1,0,.14Zm.21,2.74c.06,0,0-.06,0-.06s-.07-.22-.1-.17,0,.05,0,.07A.25.25,0,0,1,244,452.35Zm0-1.06c0,.08,0,.13.08.21s0-.15.06-.11.07.16.1.24c.08-.2-.26-.49-.28-.64s0,0-.06,0,.18.24.18.32S244,451.24,243.94,451.29Zm.12.27s0,.14.09.09S244.11,451.52,244.06,451.56Zm0-2.63-.06,0c0,.06.06.08.1,0Zm.46.34c-.14,0,0-.13-.09-.22s0,.12,0,.16a.47.47,0,0,1-.22-.3c-.07,0,.08.1,0,.12.1.14.33.17.33.38A.16.16,0,0,0,244.48,449.27Zm-.22,2.76s.1.19.12.14S244.27,452,244.26,452Zm.06.67.2.35A.47.47,0,0,0,244.32,452.7Zm-.17-3.28s0,.14.09.08S244.19,449.37,244.15,449.42Zm.24,2.89.26.43A.74.74,0,0,0,244.39,452.31Zm.3,1-.08-.14,0,0,.08.14Zm.06-.42.21.34C245,453.17,244.86,452.93,244.75,452.91Zm.76-.42-.06,0,.15.25C245.62,452.7,245.53,452.58,245.51,452.49Zm.22.45s0,0,.06,0l-.08-.12s-.07,0-.11,0l.09.14C245.76,453,245.67,453,245.73,452.94Zm1.67-1c0,.07.1.09.17,0Zm.56-.85c-.05,0,0,.14,0,.12S248,451.14,248,451.09Zm.06.21s0,.1.1.05S248,451.3,248,451.3Zm.07.12s.11.21.12.15S248.1,451.37,248.09,451.42Z"/>
                        <path class="cls-41" d="M246.19,460.67a.09.09,0,0,1,0,.08c.11.11.09.21.2.29s0,0,0,0a.29.29,0,0,1,.13.2c-.07,0,0,.07-.12,0s-.05,0,0,.08-.11.07-.13,0-.12,0-.13.14-.07,0-.09,0,0,0-.05,0-.07,0-.08,0,0,0,0,0,0,0-.08,0,0-.11-.06-.13a1.1,1.1,0,0,1,0,.18c-.16,0-.29.21-.47.17a.25.25,0,0,0,0,.08.11.11,0,0,1-.11,0s0,.09-.11.1,0,0-.08,0,0-.08,0-.14,0,.05.06,0-.06,0-.07-.09,0,.19,0,.26c-.22,0-.46.25-.7.29,0-.07,0-.1-.06-.16a.09.09,0,0,1-.09-.05c0,.08.16.14.1.24l-.05-.09s0,.06,0,.1a.31.31,0,0,1-.28.09s0,0,0-.08,0,0,0,0,0,.07.07.09-.18,0-.2.13,0,0-.06,0a1.28,1.28,0,0,0,0-.19s0,0-.08,0,.06,0,.07.09,0,.06,0,.11,0-.11-.11-.06,0,0,0-.08,0,0,0,0-.05-.08,0-.12-.08-.11-.15-.11,0-.07,0-.12,0,0-.07,0,0-.05,0-.09,0,0-.05,0,0-.06,0,0-.05-.12,0-.15,0-.07-.08,0a3.57,3.57,0,0,0-.53-.86c.1,0-.05-.15,0-.2l.06.11s0,0,0,0-.07-.11-.12-.11a.07.07,0,0,1,0-.09s-.07,0-.1-.08.06.12.08.19c-.16,0-.21-.37-.35-.46l0,0c-.07-.07-.14-.17-.1-.26s-.11-.05-.15-.14,0,.07,0,.09a.06.06,0,0,1,0-.07c0-.08-.09-.22-.15-.24s0,0,0,0l.09.16c.08-.11-.08-.18-.11-.29s.1.18.19.17a2.23,2.23,0,0,0-.38-.48c0,.07.12.16.17.29l-.05,0c0-.12-.1-.13-.15-.22s0,.05,0,.05a.19.19,0,0,0,0-.12c-.24-.24-.34-.67-.57-1,0,.05.08.13,0,.16a.2.2,0,0,1,0-.16s-.06,0-.08,0,0,0,0-.07,0,0,.05,0,0,0,0-.05,0,.05,0,.06,0-.05,0-.07,0-.2-.12-.15c0-.15-.21-.27,0-.43,0,.07.11,0,.14-.07s.18,0,.16-.09h.18s0-.05,0-.07.12,0,.19-.05.07.08.06.18,0-.05.05-.05.07.08,0,.12,0,0,.07,0a.1.1,0,0,0,.06.12s0,0,0,0,0,.08.07.07c0,.18.27.36.25.47s.11.14.18.14,0,0,0,0,.09.11.14.12.12.18.12.28.06,0,.07,0l0,0s.06.09.1.08,0,.17.12.22,0,.05,0,.07a1.5,1.5,0,0,1,.18.24s0,0,0-.05,0,0,.05,0a.34.34,0,0,0,.15.29s0,0,0,.08.08,0,.06.06,0,0,.05,0,0,.21.16.24.08.3.24.34a.07.07,0,0,1,0,.07s.15.07.11.15.16.09.12.17a.63.63,0,0,0,.12.11c0,.14.22.3.27.39s.08.1.11.21.07,0,.09,0,.2-.12.26-.11,0,0,0-.06.19-.12.36-.16,0,0,0,.07,0-.08,0-.11.13-.13.21-.06.14-.06.12-.12.09,0,.06,0,.2-.15.27-.09,0-.06.09-.07l0,.06s0,0,0-.08,0-.06.06-.06,0,0,0,0,.18-.07.17-.13,0,0,0,0a1.2,1.2,0,0,0,.16-.15c.07,0,.11.08.18.1l0,0,0,0S246.16,460.68,246.19,460.67Zm-4.71-1.57s0,.15.1.12S241.53,459.08,241.48,459.1Zm.59,1.22s-.06,0-.09-.05l0,0Zm.21,0a3.6,3.6,0,0,0-.29-.35.56.56,0,0,0,.18.23.85.85,0,0,0,.22.47A.59.59,0,0,1,242.28,460.29Zm.07-.12s-.07,0-.11,0l0,0Zm0-.41a.68.68,0,0,0,.06.36C242.49,460,242.39,459.88,242.39,459.76Zm.09-.48s0,0,.05,0a0,0,0,0,1,0,.07Zm.25.69c-.1-.07,0-.16-.11-.27s0,.1,0,.13S242.67,460,242.73,460Zm-.06-.29c.05,0,0-.15,0-.13S242.63,459.62,242.67,459.68Zm.09.35c0-.08,0-.18-.06-.28C242.65,459.82,242.76,459.94,242.76,460Zm0,.71c0,.08.13.19.13.26s0-.09-.07,0,0,.08.06.15,0-.07,0-.09,0,.17.09.16A1.53,1.53,0,0,0,242.73,460.74Zm.17.42h0l.05.09h0Zm.08.34c.05,0,.07.17.13.16S243,461.48,243,461.5Zm.06-.94,0,0c.07,0,0,.05.07.12A.17.17,0,0,0,243,460.56Zm0-.22.12.23C243.15,460.48,243.11,460.36,243,460.34Zm.08,1.38c0,.12.14.27.18.4C243.3,462,243.15,461.85,243.1,461.72Zm.12-.51a1,1,0,0,0,.22.54C243.31,461.57,243.36,461.33,243.22,461.21Zm.23,1.09s-.06,0-.08-.07l0,0a.83.83,0,0,1,.15.23c.05,0,0,0,0-.05A.11.11,0,0,1,243.45,462.3Zm0-.46c.15.21.17.45.31.59s0,0,0-.05a1.14,1.14,0,0,0-.15-.16C243.69,462.12,243.52,461.87,243.43,461.84Zm.29-.38c.09.12.11.29.16.35s0,0,0,0,.06.09.1.08S243.87,461.56,243.72,461.46Zm.24.49,0,0s.05.18.11.17A.4.4,0,0,1,244,462Zm1.52-.34a0,0,0,0,0,0,0,.06.06,0,0,0,.1,0C245.53,461.58,245.49,461.65,245.48,461.61Zm.49-.5-.05,0a.08.08,0,0,0,.08,0Zm0,.11s0,.15.1.13S246,461.2,246,461.22Z"/>
                        <path class="cls-41" d="M249.55,458.92a.11.11,0,0,1,0,.07c.1.11.09.21.19.3s0,0,0,0,.13.09.13.19,0,.07-.12,0,0,.05,0,.08-.11.07-.13,0-.13,0-.13.14-.08,0-.09,0,0,0-.06,0-.07,0-.07,0,0,0,0,0,0,0-.08,0,0-.11-.07-.13a.37.37,0,0,1,0,.18c-.15,0-.29.22-.47.18a.22.22,0,0,0,0,.08.17.17,0,0,1-.12,0s0,.09-.1.1,0,0-.08,0,0-.08-.05-.15,0,.05.06,0-.06,0-.06-.09,0,.19,0,.26c-.21,0-.46.25-.7.3,0-.08,0-.11-.05-.17s-.07,0-.1-.05.16.14.11.24l0-.09c-.05,0,0,.07,0,.1a.28.28,0,0,1-.27.09s0,0,0-.07,0,0,0,0,0,.08.07.09-.17.05-.19.13,0,0-.06,0a1.41,1.41,0,0,0,0-.2s-.06,0-.08,0,.06,0,.07.09,0,.06,0,.11,0-.11-.11-.06,0-.05,0-.08,0,0,0,0,0-.08,0-.12-.08-.11-.14-.11,0-.06,0-.12,0,0-.06,0,0-.05,0-.09,0,0-.05,0,0-.06,0,0,0-.12,0-.15-.05-.06-.08,0a3.57,3.57,0,0,0-.53-.86c.1,0-.06-.15,0-.19l.05.1s0,0,0,0-.06-.11-.12-.11a.09.09,0,0,1,0-.09c-.05,0-.08,0-.1-.08s0,.13.07.19c-.15,0-.21-.37-.34-.46l.05,0c-.08-.07-.15-.17-.11-.25s-.1-.06-.14-.14,0,.07,0,.08a.06.06,0,0,1,0-.07c-.06-.08-.09-.22-.16-.24s0,0,.06,0l.08.16c.08-.11-.07-.18-.11-.28s.11.17.2.16a2.56,2.56,0,0,0-.39-.48c0,.08.13.16.18.29l-.05,0c0-.11-.1-.13-.15-.22s0,0,0,0a.17.17,0,0,0,0-.12c-.24-.23-.33-.66-.57-1,0,.05.08.13,0,.17a.24.24,0,0,1,0-.17s-.05,0-.07,0,0,0,0-.06,0,0,0,0,0,0,0-.06,0,0-.06.07,0-.05,0-.08,0-.19-.11-.14c0-.16-.22-.28-.06-.43.05.06.12,0,.15-.08s.18,0,.16-.08l.17,0s0-.05,0-.06.12,0,.18-.05.08.07.07.17,0,0,0,0,.07.08,0,.13,0,0,.06,0a.1.1,0,0,0,.07.12s0,0,0,0a.05.05,0,0,0,.07.07c0,.18.27.36.25.47s.1.14.17.14,0,0,0,0,.1.11.15.12.11.18.11.28.06,0,.07,0l0,0s.06.09.1.08,0,.17.12.23,0,0,0,.06a1.55,1.55,0,0,1,.19.24s0,0,0-.05,0,0,.05,0,.1.28.16.29,0,0,0,.08.08,0,0,.06,0,0,.05,0,.06.2.17.23.08.3.24.34c0,0,0,.06,0,.07s.15.08.12.15.15.09.12.17l.12.12c0,.14.22.29.27.38s.07.1.11.21.07,0,.09,0,.2-.12.26-.11,0,0,0-.05.19-.13.36-.17,0,0,0,.07,0-.08,0-.11.12-.13.21-.05.13-.07.11-.12.1,0,.07,0,.19-.15.27-.08,0-.07.08-.08l0,.06s0,0,0-.08,0,0,.05-.06,0,0,0,0,.18-.06.16-.13,0,0,.05,0,.12-.09.16-.14.11.07.18.09l-.06,0,0,0S249.52,458.92,249.55,458.92Zm-4.71-1.57s0,.14.09.11S244.89,457.32,244.84,457.35Zm.58,1.22s0-.05-.09-.06l0,0Zm.21,0a2,2,0,0,0-.28-.34.51.51,0,0,0,.17.22,1,1,0,0,0,.23.48A.66.66,0,0,1,245.63,458.53Zm.07-.11s-.07,0-.1,0l0,0Zm0-.42a.7.7,0,0,0,.07.36C245.84,458.26,245.75,458.12,245.74,458Zm.1-.48s0,0,0,0,0,.05,0,.08Zm.25.69c-.1-.06-.06-.16-.11-.26s.05.1,0,.12S246,458.21,246.09,458.21Zm-.07-.29s0-.15,0-.13S246,457.87,246,457.92Zm.1.35c0-.08,0-.18-.06-.28C246,458.07,246.12,458.18,246.12,458.27Zm0,.71a1.66,1.66,0,0,1,.13.27s0-.1-.07-.05,0,.09,0,.16,0-.08,0-.09,0,.16.09.16A1.71,1.71,0,0,0,246.09,459Zm.17.42,0,0,.05.09,0,0Zm.08.34s.06.18.12.17S246.4,459.73,246.34,459.74Zm.06-.94-.05,0c.07,0,0,.05.06.12A.14.14,0,0,0,246.4,458.8Zm0-.22.12.23A.2.2,0,0,0,246.37,458.58Zm.09,1.39c0,.11.13.27.18.39C246.66,460.25,246.51,460.1,246.46,460Zm.12-.51a.92.92,0,0,0,.22.53C246.66,459.81,246.72,459.58,246.58,459.46Zm.22,1.08s-.05,0-.07-.07l0,0a.84.84,0,0,1,.16.24s0-.05,0-.05A.13.13,0,0,1,246.8,460.54Zm0-.46c.16.22.17.45.32.6.05,0,0-.05,0-.06l-.15-.16C247,460.37,246.88,460.11,246.78,460.08Zm.3-.38c.09.12.1.3.16.35s0,0,0,0,0,.09.09.08S247.23,459.8,247.08,459.7Zm.24.49,0,0s.06.18.12.17A.48.48,0,0,1,247.32,460.19Zm1.52-.33s0,0,0,0,0,.06.1,0S248.85,459.89,248.84,459.86Zm.49-.51-.05,0a.06.06,0,0,0,.07,0Zm0,.11s.05.15.1.14S249.38,459.44,249.32,459.46Z"/>
                        <path class="cls-41" d="M253.55,457.13c0,.08.06.11.08.22-.21.14-.37.19-.48.37-.11,0-.2.11-.31.13s0,0,0,0-.21-.3-.37-.32-.07-.15-.16-.09,0-.1-.07-.06,0,0,0-.08a.62.62,0,0,0-.36.15,3.68,3.68,0,0,0-.23-.49c.05,0,.15-.09.2-.06,0-.22-.13-.14-.13-.34-.07,0-.18-.12-.14-.21l-.11,0s0-.06,0-.08-.08-.14-.14-.11-.11-.12-.08-.22-.05,0-.08,0-.07-.29-.17-.23.06-.07.07-.11l-.08-.15c-.07,0,0,.12,0,.17l-.07,0a.11.11,0,0,0,0-.13s0,0-.06,0-.08-.09-.07-.21,0,0-.05,0-.06-.08,0-.09-.05-.17-.15-.13,0-.16-.07-.13,0-.06,0-.08a.21.21,0,0,0-.14-.1c0-.06,0,0,0-.08s.05-.06,0-.1-.06,0-.09.06,0-.1,0-.14h-.07c0-.12-.06-.1-.08-.21s0,0,0,.05,0-.18-.07-.2,0,0,0,0a.28.28,0,0,0-.16-.29l.06,0a.09.09,0,0,0-.12,0c0-.12,0-.09,0-.16s-.05.08-.05,0a.24.24,0,0,1-.25.16s0,.09-.08.06-.15,0-.22.08-.05.08-.08.06-.07,0-.12.09-.28-.25-.28-.31c-.15.12.27.32.22.46s0,0,0,0,0,.15.1.17c-.07,0-.05.13,0,.18s0,.05,0,.06l.08.14s-.07,0-.1,0,.2.13.15.25.07.13.13.14,0-.07,0-.1.07.15.15.13,0,.05,0,.09,0,0-.07,0a2.79,2.79,0,0,0,.34.91,1,1,0,0,0-.13-.37c.06,0,0,0,.07-.06s0,.13.11.21l0,0c0,.06,0,0,.06.06a.18.18,0,0,0,0,.16s0-.07,0-.08,0,.08.09.09c-.1,0-.14.14-.05.17s-.07-.08,0-.09a.33.33,0,0,1,.12.33c.06,0,0-.07.06-.08a3.42,3.42,0,0,1,.21.66.12.12,0,0,1,.08.06.08.08,0,0,1,.06.05h0l0-.06s0,.06,0,.17h0c0,.06.1.05.07.13s0-.06.07,0,0-.06,0-.07,0,0,0,0,.13-.05.1-.11.05,0,.08,0,.07-.17.14-.07c.08-.06.12-.12.21-.18s.07.18.08.21,0,0,0,0-.09-.18-.1-.2l.2-.05s0,0,0-.05a.7.7,0,0,0,.21-.11s0,0,0,0,.09,0,.12-.11c0,.11.14.33.12.41s.06,0,.07.07-.09.1-.16.15-.06,0-.1,0,0,0,0,.06,0,0-.06,0,.05,0,0,.06a.23.23,0,0,1-.14,0s0,0,0,.06l-.11.06,0-.05a.48.48,0,0,1-.36.2.06.06,0,0,0,0,.1s0,0-.06,0-.09.07-.08.11,0,0,0-.05,0,0,0,.05.05.06.08.08l-.06,0,0,.07h0c0,.06.11.09,0,.16s.08-.06.09,0l-.06,0c.1.07.08.2.18.27s-.05.06,0,.1a.35.35,0,0,0-.19.1c-.1,0-.14-.26-.23-.33,0,.11.11.24.13.35s0,.05-.08.08-.09,0-.11,0a.07.07,0,0,0-.1,0s0,0,0,.06-.16,0-.19.1,0,0-.07,0-.1-.17-.1-.31,0-.06-.06-.08,0,0,0-.05c-.08-.17-.11-.37-.23-.47s0-.18-.06-.2a.41.41,0,0,0-.13-.38c.05,0,0-.09.05-.11s-.08-.05,0-.08,0,0-.06,0a.05.05,0,0,1,0-.08c0-.05,0,0-.06,0l.06,0s-.08,0,0-.07,0,0-.06,0a.76.76,0,0,0-.1-.41c0-.2-.23-.36-.19-.59,0,0-.06,0-.08-.07s0-.05.05-.07-.09,0-.11-.05,0-.06.08-.08,0-.08-.11-.12-.07-.11,0-.13-.07,0-.08,0,0-.05,0-.08a.45.45,0,0,0-.14-.4l.06,0c-.1-.05,0-.27-.18-.32l.05,0c-.09-.09-.05-.32-.2-.38l.06,0s-.05,0-.06,0,.05,0,.05-.06,0-.17-.16-.24l.06,0c0-.06-.09-.14,0-.18-.12-.09-.09-.22-.22-.41,0,0,0-.07.06-.1s0,0-.07,0,0-.05,0-.11.17-.06.27-.11l0,0s0-.08.09,0,0-.07,0-.1,0-.06,0,0,0,0,.05,0,.08-.1.11-.07a.66.66,0,0,1,.4-.13c0-.1.22-.08.32-.2s0,0,0,.09,0-.07,0-.08.24-.09.43-.13c0,0,0,.07,0,.1s0,0,.07,0,.14.1.09.17,0,0,.05,0,0,.06,0,.09.08.09.15.16.08,0,.09,0,0,0,0,0,.18.08.12.15,0,0,.07,0a.82.82,0,0,0,.15.23s0,.05,0,.07.06,0,.08,0,.07.25.17.18.06.07.09.09,0,.07,0,.1.05,0,.07,0,.07.14.17.25,0,0-.07,0c.13.07.23.23.35.32s0,0,0,.08.17.2.29.35.06,0,.1,0,0,0,0,.05.17,0,.11.14l.08,0c0,.07,0,.17.14.18s0,0,0,.06,0,.08.12,0c0,.1.08.25.22.28a1,1,0,0,0,.29.37l-.06,0c0,.05.13,0,.08.06h.11c0,.06,0,.05,0,.08s.14.27.23.31.12.14.18.18.09.07,0,.14S253.47,457.13,253.55,457.13Zm-5.07-3.52c0,.06.05.07.09.09s0,.16.06.2a.08.08,0,0,1,0-.11C248.61,453.7,248.56,453.6,248.48,453.61Zm.61,1.53.06,0s0,.07,0,.09Zm.27.51c0,.06.06.22.12.23s0,.05,0,.06-.06-.13-.13-.24S249.3,455.65,249.36,455.65Zm.06,1.3c-.09,0,0-.14-.08-.22a.51.51,0,0,0,0,.31C249.46,457,249.35,457,249.42,457Zm.3-.06h-.06c-.06-.06,0-.08,0-.14s0,.12,0,.19.07.07.12,0,0-.19-.08-.3C249.63,456.73,249.73,456.82,249.72,456.89Zm-.07.78a.45.45,0,0,0,.14.27l-.07,0s0,.11.07.09,0,0,0-.06l.06,0c0,.05,0,.11,0,.17C249.93,458,249.71,457.74,249.65,457.67Zm.25.79s.06.18.12.16S250,458.43,249.9,458.46Zm0,.59,0,0,.13.24C250.08,459.25,250,459.14,250,459.05Zm0-5.21a.1.1,0,0,0,0,.12S250,453.88,250,453.84Zm0,3.64,0,0c0,.05,0,0,.06.12S250.05,457.53,250,457.48Zm0,1.22.2.38A.51.51,0,0,0,250,458.7Zm.19-1.15s0,.07.07.09-.09,0-.11-.06,0,0,0,0v0Zm0,.62a1.44,1.44,0,0,0,.17.52A1,1,0,0,0,250.17,458.17Zm0-3.9s0,.15.1.12S250.27,454.24,250.21,454.27Zm0-.06a.46.46,0,0,1,.15.2C250.44,454.33,250.32,454.19,250.25,454.21Zm.35.49.13.25C250.74,454.87,250.72,454.69,250.6,454.7Zm0,3.71s0,0,0,0A.08.08,0,0,0,250.62,458.41Zm.25-4.14-.07-.14c-.09.07-.1,0-.18,0A.8.8,0,0,1,250.87,454.27Zm0,.16c0,.05.16,0,.12.08s0,0,.05,0a1.28,1.28,0,0,1-.14-.23S251,454.4,250.88,454.43Zm.39.35c-.06-.07,0-.12-.05-.17s-.09-.05-.14,0,.12,0,0,.07S251.19,454.8,251.27,454.78Zm-.15,3.06c.06,0,0-.11,0-.06Zm.12-.06c.06,0,0-.15,0-.13S251.21,457.73,251.24,457.78Zm0-2.63a1,1,0,0,1,.11.35A.31.31,0,0,0,251.26,455.15Zm0-.09.21.4A.68.68,0,0,0,251.29,455.06Zm.08-.09,0,.07.06,0C251.45,455,251.41,455,251.37,455Zm0,.62s0,.09.07.06S251.46,455.55,251.42,455.59Zm.08,1.48s0,0,0,0S251.49,457.09,251.5,457.07Zm0,0a2.26,2.26,0,0,1,.31.44l-.09.05C251.65,457.41,251.61,457.18,251.53,457.06Zm.11-.09v0Zm.89-.7s0,0-.05.05.06.09.11.07S252.62,456.24,252.53,456.27Zm.06,0s0,.15.09.12S252.65,456.2,252.59,456.23Zm.17,1c-.09.12,0,.28,0,.42C252.87,457.53,252.73,457.36,252.76,457.23Zm.19.17,0,.09C253.05,457.48,253,457.36,253,457.4Z"/>
                        <g class="cls-42">
                            <path class="cls-41" d="M239.07,439.11l-.12,0v0s.09,0,.13,0l0,0a.09.09,0,0,1,0,.11s0,0,0,0v0h0s0,0,0,0,0,.07,0,.11a.08.08,0,0,1,.09,0l.06-.06s0,0,0,0,0,0,0,0h.13a.06.06,0,0,0-.08,0,.11.11,0,0,1,.14,0s0,0,0,0,0,0,.07,0,0,0,0,0,0,0,0,0a.11.11,0,0,0,.08,0h0l0,0a.22.22,0,0,0,.17,0s0,0,0,0,0,0,.05-.05,0,0,0,0l.22-.06a3.88,3.88,0,0,1-.36.15v0a.86.86,0,0,0,.39-.17s.08,0,.09,0a0,0,0,0,1,0,0c.22-.07.4,0,.59-.06h-.38a2.23,2.23,0,0,1,.42-.15s0,0,0,.08l0,0s0,.08,0,.12,0,0,0,.05c-.17.06-.27,0-.45,0,.15,0,.29,0,.45,0s0,0,0,.05,0,0,0,0,0,0-.06,0,0,0,0,0-.08,0-.08.05a.07.07,0,0,1-.06,0c0,.05-.13,0-.2.05s.05,0,.08,0v0s-.12,0-.13,0-.11,0-.21,0-.06,0-.06,0l-.3.07h0a.64.64,0,0,0-.14.06s0,0,0,0-.09,0-.12.06,0,0,0,0,0,0-.05,0v0s-.05,0-.06,0-.09,0-.11,0-.06,0-.08.06-.05,0-.06,0,0,0,0,0-.07,0-.07,0,0,0-.07,0v0h0s0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0-.2.07-.35.11v0c0,.05,0,0,0,.05h0v0c0,.05-.07,0-.13.07v0s0,0-.07,0,0,0,0,0,0,0,0,0-.11,0-.17.07,0,0,0,0,0,0,0,0,0,0,0,0A1.23,1.23,0,0,1,238,440s.07,0,.11-.06-.06,0-.12,0,0-.12,0-.17h0s0,0,0,0,0,0,0,0-.08-.2-.06-.29,0-.18-.08-.22,0,0,0-.06h0s0,0-.05,0,0-.08,0-.13h0s0,0,0,0,0,0,0,0,0-.09,0-.14a.12.12,0,0,0,.07-.1.1.1,0,0,0,.06-.05,0,0,0,0,0,0,0s.06,0,.08,0,0,0,.05,0l0-.05s0,0,0,0l-.05,0s.11,0,.13,0,0,0,0,0,0,0,0,0,.06,0,.11,0,0,0,0,0,.05,0,.08,0,.11.05.14.11h0s0,0,0,.06l0,0s0,0,0,0,0,0,.05,0a.61.61,0,0,1,0-.14s0,0,0,0,0,0,0,0,0,0,0,0l-.05,0s0,0,0-.06l.2-.11c.05,0,.12,0,.17,0s0,0,0,.05,0,0,0,0,0,.06,0,.06,0,.07,0,.08l0,.05a.2.2,0,0,0,0,.17c-.06,0-.17.06-.21.12a1.62,1.62,0,0,0,.19,0s0,0,0,0v0s0,0,0,0a.08.08,0,0,0,0,.08.18.18,0,0,0-.12,0s.06,0,.08,0,0,0,0,0a.2.2,0,0,0,0,.08S239.06,439.1,239.07,439.11Zm-.87.92s0,0,0-.08-.09,0-.09.06,0,0-.06,0,0,0,0,0,.11-.05.14-.05,0,0,0,0S238.18,440.05,238.2,440Zm.17-.15s0,0,0,.06-.12,0-.1.06.06-.08.1,0,0,0,0,0,.06,0,.08,0,0,0,0,0S238.41,439.86,238.37,439.88Zm.11,0h0s0,0,0-.05S238.47,439.85,238.48,439.88Zm.26-.65.09,0s-.09,0-.1,0a1.34,1.34,0,0,0-.07-.18s0,0,0,0,0-.05,0-.08a.11.11,0,0,1-.09-.06s-.06,0-.09,0l-.05,0v0s-.06,0-.07,0-.07,0-.07.07,0,0,0,0a.26.26,0,0,1-.15.12s0,.05,0,0,0,0,0,0l0,.05s0,0,0,0h0s0,0,0,.06h0a2.52,2.52,0,0,1,.1.29c.06,0,0,.09.08.12a0,0,0,0,0,0,0s0,0,0,0,0,0,0,0,0,.06,0,.11l.2-.08s0,0,0,0,0,0,0,0,.06,0,.1,0,0,0,0,0l0,0s0,0,0,0,0,0,0,0h0s0,0,0,0h0v0s0-.06.1-.05,0,0,0,0,0,0,0,0,0,0,0,0Zm-.22.61s0,0,.07,0S238.54,439.84,238.52,439.84Zm.09,0,0,0s.05,0,0-.05S238.62,439.8,238.61,439.81Zm-.62-.26s-.08,0-.06,0S238,439.59,238,439.55Zm-.06,0a.08.08,0,0,0,0-.05S237.93,439.53,237.93,439.55Zm1,.08s-.06.05-.08.07a.37.37,0,0,0,.25-.06.43.43,0,0,1-.21,0S238.91,439.66,238.91,439.63Zm-1-.17s0,0,.08,0,0,0-.07,0S237.85,439.44,237.86,439.46Zm1.28.16.31-.1A.67.67,0,0,0,239.14,439.62Zm.78.06h0S239.9,439.68,239.92,439.68Zm0,0v0l-.06,0h.06Zm-.37-.19s0,0,0,.05,0-.06.05,0,0,0,0,0,.1-.06.15-.05,0,0,0,0A1.94,1.94,0,0,0,239.57,439.45Zm.45.07a.14.14,0,0,1,.11,0S240,439.48,240,439.52Zm-1.21-.24s0,0,0,0v0S238.8,439.26,238.81,439.28Zm.1,0s0,0,.06,0S238.9,439.25,238.91,439.28Zm1.24.23s0,0,0,0S240.13,439.49,240.15,439.51Zm0-.09a.21.21,0,0,0-.14.07S240.2,439.47,240.19,439.42Zm-1.26-.26-.06,0v0s0,0,.06,0Zm1.13.24a2.46,2.46,0,0,1,.26,0A.3.3,0,0,0,240.06,439.4Zm.68,0c-.07,0-.14,0-.19.1S240.72,439.4,240.74,439.35Zm-.28,0h0S240.44,439.35,240.46,439.36Zm-.23-.1s-.08,0-.08,0S240.24,439.29,240.23,439.26Zm.38.05.12,0S240.61,439.29,240.61,439.31Zm-.2-.09s0,0,0,0,.1,0,.17-.06S240.41,439.17,240.41,439.22Zm0-.05h0S240.43,439.14,240.43,439.17Zm-1.42-.36c0,.05-.08.05-.13.07S239,438.83,239,438.81Zm-.49-.05h0v0S238.52,438.74,238.52,438.76Zm2.12.37s0,0,.05,0S240.65,439.12,240.64,439.13Zm-2-.4h0v0S238.59,438.71,238.59,438.73Zm2.32.31-.2.07s0,0,0,0S240.87,439,240.91,439Zm-.13-.25a.06.06,0,0,1,.06,0s0,.06,0,.05,0,0,0,0,0,.08,0,.1,0,.05,0,.06,0,0,0,0-.14,0-.13,0,0,0-.07,0,0-.09-.05-.1,0,0,0,0,0,0,0,0a.13.13,0,0,0,.08,0h-.08s0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0v0C240.68,438.81,240.75,438.76,240.78,438.79Zm-2.56-.23v0h0S238.2,438.57,238.22,438.56Zm.07,0h0S238.29,438.55,238.29,438.57Zm0,0v0h.1Zm2.32.23s.08-.08.12-.06S240.68,438.8,240.62,438.81Zm0-.11c.09,0,.13-.1.23-.14s0,0,0,.06-.12.05-.17.07.12,0,.18,0,0,0,0,0-.12.06-.21.07S240.61,438.71,240.58,438.7Zm-1.09-.7s.06,0,.06,0,.11,0,.17,0v0s0,0,0,0,.24,0,.34,0v0s.06,0,.11,0,0,0,0,0,.06,0,.09,0,.09,0,.09.09,0,0,0,0v0s.07,0,.08-.05,0,0,0,0h0a.43.43,0,0,0,0,.07s0,0,0,0-.18,0-.17.07,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0a.21.21,0,0,0-.14,0s0,0,0,0a.28.28,0,0,1-.2,0s0,0-.06,0-.12,0-.16,0,0,0,0,0,0,0,0,0a.16.16,0,0,1-.09.06v0s-.07,0-.08,0,0,0,0,0-.06,0-.08,0-.11.07-.16.11-.13,0-.15,0a.5.5,0,0,1,.12,0s-.05,0-.06,0,.1-.05.15-.08c-.14,0-.25.14-.42.18a2.23,2.23,0,0,1,.41-.26s.07,0,.08,0a.53.53,0,0,0-.22.08s.07-.06.09-.09,0,0,.07,0,.11,0,.12-.08.09,0,.13,0S239.5,438,239.49,438Zm1.09.66s.06,0,.1-.06S240.63,438.65,240.58,438.66Zm-1.71-.34a.07.07,0,0,1,0-.06A0,0,0,0,1,238.87,438.32Zm1.72.29c0-.05.11-.08.17-.11s0,0,0,0v0a.09.09,0,0,0,.06,0C240.79,438.57,240.66,438.58,240.59,438.61Zm-.12-.35a.5.5,0,0,1,.14-.1v0l-.09,0a.06.06,0,0,0,.06,0s0,0,0,0,0,0,.08,0,0,0,0,0,0,0,0,0,0,0,.05,0a.33.33,0,0,0,0,.14c-.09,0-.13.08-.21.11s0,0,0,0,0-.06,0-.13,0,0,0,0-.06-.1-.09-.17a0,0,0,0,0,.06,0S240.47,438.22,240.47,438.26Zm-1.51,0s0,0,0,0,0,0,.06,0S238.94,438.25,239,438.27Zm1.72.19a.2.2,0,0,0-.09.09h0S240.67,438.5,240.68,438.46Zm-1.63-.26v0h0S239.08,438.2,239.05,438.2Zm.25,0c0-.07.23-.07.3-.13a.86.86,0,0,0-.35.12S239.28,438.23,239.3,438.22Zm1,0s0,0,0,0h0Zm-.87-.17v0c.13,0,.3-.11.41-.07s0,0,0,0a1,1,0,0,0-.21,0C239.55,438,239.46,438,239.41,438.07Zm1,.13c.08,0,.11-.12.17-.06a.75.75,0,0,1-.2.1s0-.06.06-.08S240.42,438.19,240.41,438.2Zm0,0v0s0,0-.06,0S240.35,438.2,240.37,438.19Zm-.76-.1,0,0S239.59,438.07,239.61,438.09Zm.08,0h.05v0l-.05,0Zm.49,0,0,0S240.16,438,240.18,438ZM240,438s0,0,.08,0v0S240,438,240,438Z"/>
                            <path class="cls-41" d="M238.76,438.79l-.12,0v0c0-.05.1,0,.13,0s0,0,0,0a.11.11,0,0,1,0,.12s0,0,0,0v0h0s0,0,0,0,0,.08,0,.11a.09.09,0,0,1,.1,0l.05,0s0,0,0,0,0,0,0,0h.13a.08.08,0,0,0-.08,0c0-.05.09-.05.14,0s0,0,0,0,0,0,.07,0,0,0,0,0,0,0,0,0a.11.11,0,0,0,.08,0h0s0,0,0,0,.1,0,.17,0,0,0,0,0,0,0,.05,0,0,0,0,0a1,1,0,0,1,.22-.07,3.88,3.88,0,0,1-.36.15v0a.89.89,0,0,0,.38-.18s.08,0,.1,0,0,0,0,0c.22-.08.4,0,.59-.06h-.38a3.92,3.92,0,0,1,.42-.15s0,0,0,.08,0,0,0,0,0,.08,0,.12,0,0,0,0c-.17.07-.27,0-.45.05h.45s0,0,0,0,0,0,0,0,0,0-.06,0,0,0,0,0a.1.1,0,0,0-.08.06h0c-.06,0-.14,0-.21,0s.05,0,.08,0v0s-.11,0-.12,0-.12.05-.22,0-.06,0-.06.05l-.3.06s0,0,0,0l-.14.06s0,0,0,0-.09,0-.12.07,0,0,0,0,0,0,0,0,0,0,0,0,0,0-.06,0-.09,0-.11,0-.06,0-.08.06-.05,0-.06,0,0,0,0,0-.06,0-.07,0,0,0-.07,0v0h0s0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0-.2.06-.35.1v0s0,0,0,0h0v0c0,.05-.07,0-.13.06v0s0,0-.07,0,0,0,0,0,0,0,0,0-.1,0-.17.06,0,0,0,0,0,0,0,0,0,0,0,0,0-.12-.08-.23.07,0,.11-.06-.06,0-.11,0a1.62,1.62,0,0,0-.06-.17s0,0,0,0,0,0,0,0,0,0,0,0-.09-.21-.07-.3,0-.17-.08-.22,0,0,0-.06h0s0,0-.05,0,0-.08,0-.13h0s0,0,0,0,0,0,0,0,0-.1,0-.14a.26.26,0,0,0,.07-.11.1.1,0,0,0,.05,0,0,0,0,0,0,0,0s.06,0,.08-.05,0,0,.05,0l0-.05s0,0,0,0h-.05s.11,0,.13,0,0,0,0,0a0,0,0,0,0,0,0s.06,0,.11,0,0,0,0,0,0,0,.08,0,.11.05.14.11h0s0,0,0,.06l0,0s0,0,0,0a.1.1,0,0,1,.05,0c0-.06,0-.11,0-.15h0s0,0,0,0,0,0,0,0l-.05,0s0,0,0-.05l.2-.12a.49.49,0,0,0,.17,0s0,0,0,.05h0s0,0,0,0a.06.06,0,0,1,0,.08l0,.06a.18.18,0,0,0,0,.17s-.17.05-.2.11.12,0,.18,0,0,0,0,0v0s0,0,0,0a.08.08,0,0,0,0,.08s-.09,0-.12,0,.06,0,.08,0,0,0,0,0,0,.07,0,.08S238.76,438.77,238.76,438.79Zm-.86.91s0-.05,0-.08-.09,0-.09.06,0,0-.06,0,0,0,0,0a.32.32,0,0,0,.14-.05s0,0,0,0S237.87,439.72,237.9,439.7Zm.16-.14s0,0,0,.06-.12,0-.1.06.06-.08.1-.05,0,0,0,0,.06,0,.08,0,0,0,0-.05S238.1,439.53,238.06,439.56Zm.11,0h0s0-.05,0-.06S238.16,439.52,238.17,439.56Zm.26-.66.09,0s-.08,0-.1,0,0-.12-.07-.17,0,0,0,0,0-.05,0-.08a.11.11,0,0,1-.09-.06s-.06,0-.09,0l-.05,0v0s-.06,0-.07,0-.07,0-.07.07,0,0,0,0a.28.28,0,0,1-.14.12,0,0,0,0,1-.05,0s0,0,0,0l0,0s0,0,0,0h0s0,0,0,.06h0c0,.09.07.2.09.28s0,.09.09.12a0,0,0,0,0,0,0s0,0,0,0,0,.05,0,0,0,.06,0,.12l.19-.09s0,0,0,0,0,0,0,0,.07,0,.1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0h0v0h0v0s.05-.07.1-.06,0,0,0,0,0,0,0,0,0,0,0,0S238.47,439,238.43,438.9Zm-.22.61s0,0,.08,0S238.24,439.51,238.21,439.51Zm.09,0h0s.05,0,0-.05S238.31,439.47,238.3,439.48Zm-.62-.26s-.07,0-.06,0S237.7,439.26,237.68,439.22Zm-.06,0s0,0,0,0S237.63,439.2,237.62,439.22Zm1,.09s-.06,0-.08.06a.33.33,0,0,0,.25-.06.63.63,0,0,1-.21.05S238.6,439.33,238.6,439.31Zm-1-.18s0,0,.08,0,0,0-.07,0S237.54,439.11,237.55,439.13Zm1.28.17.31-.1A.57.57,0,0,0,238.83,439.3Zm.78.05h-.05S239.59,439.36,239.61,439.35Zm0,0v0l-.06,0v0Zm-.38-.18s0,0,0,0,0-.05.05,0,0,0,0,0,.1-.06.15,0,0,0,0-.05A1.08,1.08,0,0,0,239.26,439.13Zm.45.06s.08,0,.11,0S239.72,439.15,239.71,439.19ZM238.5,439s0,0,.05,0v0S238.49,438.93,238.5,439Zm.1,0s0,0,.06,0S238.59,438.92,238.6,439Zm1.24.23s0,0,0,0S239.82,439.16,239.84,439.18Zm0-.09a.26.26,0,0,0-.14.07S239.89,439.14,239.88,439.09Zm-1.26-.26-.06,0v0s0,0,.06,0Zm1.13.24a2.46,2.46,0,0,1,.26,0C239.94,439,239.82,439,239.75,439.07Zm.68-.05c-.07.05-.14,0-.19.1S240.41,439.07,240.43,439Zm-.28,0h0S240.13,439,240.15,439Zm-.22-.1s-.09,0-.08,0S239.93,439,239.93,438.93Zm.37.06.13,0S240.3,439,240.3,439Zm-.2-.1s0,0,0,0,.1,0,.17-.05S240.11,438.85,240.1,438.89Zm0-.05h0S240.13,438.82,240.12,438.84Zm-1.42-.36c0,.06-.08,0-.13.07S238.65,438.51,238.7,438.48Zm-.49,0,0,0s0,0,0,0S238.21,438.41,238.21,438.44Zm2.12.36s0,0,0,0S240.34,438.79,240.33,438.8Zm-2.05-.4h0v0A.05.05,0,0,0,238.28,438.4Zm2.33.31-.21.07s0,0,0,0S240.56,438.69,240.61,438.71Zm-.14-.25a.09.09,0,0,1,.06,0s0,.06,0,.05,0,0,0,0,0,.09,0,.1,0,.05,0,.06,0,0,0,0-.13,0-.13,0,0,0-.07,0,0-.09,0-.1,0,0,0,0,0,0,0,0a.12.12,0,0,0,.08,0,.06.06,0,0,0-.08,0s0-.05,0,0,0,0,0,0,0,0,0,0,0,0,0,0v0C240.37,438.49,240.44,438.44,240.47,438.46Zm-2.56-.22v0h0S237.9,438.24,237.91,438.24Zm.07,0,0,0S238,438.22,238,438.24Zm0,0v0a.1.1,0,0,1,.09,0Zm2.32.23s.09-.07.12-.05S240.37,438.47,240.31,438.48Zm0-.11c.09,0,.13-.1.23-.13s0,0,0,.06-.11,0-.17.06.12,0,.18,0a.09.09,0,0,1,0,.05c-.06,0-.12.05-.21.06S240.3,438.39,240.27,438.37Zm-1.09-.7s.06,0,.06,0,.11,0,.18,0h0s0,0,0,0a1.82,1.82,0,0,1,.33,0v0s.06,0,.11,0,0,0,0,0,.06,0,.09,0,.09,0,.1.1,0,0-.06,0v0s.07,0,.08-.05,0,0,0,0,0,0,0,0a.18.18,0,0,0,.05.07s0,0-.05,0-.18,0-.16.07h0s0,0,0,0,0,0,0,0,0,0,0,0a.25.25,0,0,0-.15,0s0,0,0,0a.28.28,0,0,1-.2,0s0,0,0,0-.13,0-.17,0,0,0,0,0,0,0,0,0a.16.16,0,0,1-.09.06v0s-.07,0-.08,0,0,0,0,0-.06,0-.08,0-.11.07-.15.11-.13,0-.16,0a.6.6,0,0,1,.12,0s-.05,0-.06,0a.54.54,0,0,0,.15-.09c-.14,0-.25.15-.42.18a2,2,0,0,1,.41-.25s.07,0,.08,0a.72.72,0,0,0-.22.08s.07-.05.09-.09,0,0,.08,0,.11,0,.11-.07.09,0,.13,0S239.19,437.66,239.18,437.67Zm1.09.67a.17.17,0,0,1,.1-.06S240.32,438.32,240.27,438.34Zm-1.71-.35a.05.05,0,0,1,0-.05S238.59,438,238.56,438Zm1.72.29a.83.83,0,0,1,.17-.11s0,0,0,0h0l.06,0C240.48,438.24,240.35,438.25,240.28,438.28Zm-.11-.35a.48.48,0,0,1,.13-.09v0l-.09,0s0,0,.06,0,0,0,0,0,0,0,.07,0,0,0,0,0l0,0s0,.05,0,.05a.24.24,0,0,0,.05.14,1.14,1.14,0,0,0-.22.12s0,0,0,0,0-.07,0-.13,0,0,0,0-.06-.09-.09-.17.06,0,.06,0S240.16,437.9,240.17,437.93Zm-1.52,0s0,0,0,0,0,0,.06,0S238.63,437.92,238.65,437.94Zm1.72.2a.15.15,0,0,0-.08.08h0S240.36,438.17,240.37,438.14Zm-1.63-.27v0h0S238.77,437.87,238.74,437.87Zm.25,0c0-.07.23-.08.3-.14a.67.67,0,0,0-.34.13S239,437.9,239,437.9Zm1,0a0,0,0,0,1,0,0h0Zm-.87-.16h0c.13,0,.3-.11.41-.07s0,0,0,0-.13,0-.21,0S239.15,437.68,239.1,437.75Zm1,.13c.08,0,.11-.13.17-.07a.54.54,0,0,1-.2.1.12.12,0,0,1,.06-.08S240.11,437.86,240.1,437.88Zm0,0v0s0,0-.06,0S240,437.88,240.06,437.87Zm-.76-.11,0,0S239.29,437.74,239.3,437.76Zm.08,0,.05,0h-.05Zm.49-.05h0S239.85,437.69,239.87,437.7Zm-.16-.05s0,0,.08,0v0S239.72,437.63,239.71,437.65Z"/>
                            <path class="cls-41" d="M238.66,438.44l-.12,0v0s.09,0,.13,0l0,0a.09.09,0,0,1,0,.11s0,0,0,0v0h0s0,0,0,0,0,.07.05.11.07,0,.09,0l.06-.06s0,0,0,0,0,0,0,0H239a.06.06,0,0,0-.08,0,.11.11,0,0,1,.14,0s0,0,0,0,0,0,.06,0,0,0,0,0,0,0,0,0,.05,0,.08,0h0l0,0a.27.27,0,0,0,.17,0s0,0,0,0,0,0,.06-.05,0,0,0,0a1,1,0,0,1,.22-.07,3.92,3.92,0,0,1-.36.16v0a1.05,1.05,0,0,0,.39-.17s.08,0,.09,0,0,0,0,0c.22-.07.4,0,.59-.06h-.38a2.23,2.23,0,0,1,.42-.15s0,0,0,.07l0,0c0,.05,0,.09,0,.13s0,0,0,.05c-.17.06-.27,0-.45.05l.45,0s0,0,0,.05,0,0,0,0,0,0-.06.05,0,0,0,0-.08,0-.08.05a.07.07,0,0,1-.06,0c0,.05-.13,0-.2,0s0,0,.08,0v0s-.12,0-.13,0-.11,0-.21,0-.06,0-.06,0l-.31.07s0,0,0,0a.64.64,0,0,0-.14.06s0,0,0,0-.09,0-.12.06,0,0,0,0,0,0-.05,0v0s0,0-.06,0-.09,0-.11,0-.07,0-.08.05,0,0-.06,0,0,0,0,0-.07,0-.07,0-.05,0-.07,0v0h0s0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0-.2.07-.35.1v0c0,.05,0,0,0,0h0v0s-.07,0-.13.07v0s0,0-.06,0,0,0,0,0,0,0,0,0-.11,0-.17.07,0,0,0,0,0,0,0,0,0,0,0,0a.85.85,0,0,1-.08-.24s.07,0,.11-.05-.06,0-.12,0a1.22,1.22,0,0,0,0-.17h0s0,0,0,0,0,0,0,0-.08-.2-.06-.29,0-.18-.08-.22,0,0,0-.06h0c0-.05,0,0,0,0s0-.09,0-.13h0s0,0,0,0,0,0,0-.05,0-.09,0-.14a.12.12,0,0,0,.07-.1.1.1,0,0,0,.06-.05,0,0,0,0,0,0,0s.06,0,.08,0,0,0,0,0l.05,0s0,0,0,0l-.05,0s.11,0,.13,0,0,0,0,0,0,0,0,0,.06,0,.11,0,0,0,0,0,.05,0,.08,0,.11.05.14.11h0s0,0,0,.06,0,0,0,0,0,0,0,0,0,0,.05,0a.76.76,0,0,1,0-.15h0s0,0,0,0,0,0,0,0l-.05-.05s0,0,0-.05l.2-.11c.05,0,.12,0,.17,0s0,0,0,.06,0,0,0,0,0,.05,0,.06,0,.07,0,.08l0,.05a.2.2,0,0,0,0,.17c-.06,0-.17.06-.21.12a1.62,1.62,0,0,0,.19,0s0,0,0,0v0s0,0,0,0a.08.08,0,0,0,0,.08.18.18,0,0,0-.12,0s.06,0,.08,0,0,.05,0,0l0,.08S238.65,438.43,238.66,438.44Zm-.87.91s0,0,0-.07-.09,0-.09.06,0,0-.07,0,0,0,0,0,.11-.05.14-.05,0,0,0,0S237.77,439.38,237.79,439.35Zm.17-.14s0,0,0,.06-.12,0-.1.06.05-.08.1,0,0,0,0,0,.06,0,.08,0,0,0,0,0S238,439.19,238,439.21Zm.11,0h0s0,0,0-.05S238.06,439.18,238.07,439.21Zm.26-.65.09,0s-.09,0-.1,0,0-.11-.07-.17,0,0,0,0,0,0,0-.08a.11.11,0,0,1-.09-.07s-.06,0-.09,0H238v0s-.06,0-.07,0-.07,0-.07.07,0,0,0,0a.24.24,0,0,1-.14.12s0,.05,0,0,0,0,0,0l0,.05s0,0,0,0h0s0,0,0,0h0c0,.1.08.21.1.28s0,.1.08.13a0,0,0,0,0,0,0s0,0,0,0,0,0,0,0,0,.06,0,.11l.2-.08s0,0,0,0,0,0,0,0,.06,0,.1,0,0,0,0,0l0,0s0,0,0,0,0,0,0,0h0s0,0,0,0h0v0s0-.07.1-.05,0,0,0,0,0,0,0,0,0,0,0-.05S238.36,438.66,238.33,438.56Zm-.22.61h.07C238.18,439.12,238.13,439.17,238.11,439.17Zm.09,0,.05,0s0,0,0-.05S238.21,439.13,238.2,439.14Zm-.62-.26s-.08,0-.06,0S237.6,438.92,237.58,438.88Zm-.06,0s0,0,0-.05S237.52,438.86,237.52,438.88Zm1,.08c-.05,0-.06.05-.08.07a.44.44,0,0,0,.25-.06.59.59,0,0,1-.21,0S238.5,439,238.5,439Zm-1.05-.17s0,0,.08,0,0,0-.07,0S237.44,438.76,237.45,438.79Zm1.28.16.31-.1A.67.67,0,0,0,238.73,439Zm.77.06h0S239.49,439,239.5,439Zm0-.05h-.06v0Zm-.37-.18s0,0,0,.05,0-.06.05,0,0,0,0,0,.1-.06.15-.05,0,0,0,0A1.94,1.94,0,0,0,239.16,438.78Zm.45.07a.22.22,0,0,1,.11,0S239.62,438.81,239.61,438.85Zm-1.21-.24h0v0S238.38,438.59,238.4,438.61Zm.1,0s0,0,.05,0S238.49,438.58,238.5,438.61Zm1.24.23s0,0,0,0S239.72,438.82,239.74,438.84Zm0-.09a.21.21,0,0,0-.14.07C239.69,438.79,239.79,438.79,239.78,438.75Zm-1.26-.26h-.06v0s0,0,.05,0Zm1.13.23c.1,0,.17,0,.26,0A.39.39,0,0,0,239.65,438.72Zm.68,0c-.07,0-.14,0-.19.09S240.31,438.73,240.33,438.68Zm-.29,0h0S240,438.67,240,438.69Zm-.22-.1s-.08,0-.08,0S239.83,438.62,239.82,438.59Zm.38.05.12,0S240.2,438.62,240.2,438.64Zm-.2-.09s0,0,0,0a1.44,1.44,0,0,1,.17-.06S240,438.5,240,438.55Zm0-.05h0S240,438.47,240,438.5Zm-1.42-.36c0,.05-.08.05-.13.07S238.55,438.16,238.6,438.14Zm-.49-.05h0v0S238.11,438.07,238.11,438.09Zm2.12.37s0,0,.05,0S240.24,438.45,240.23,438.46Zm-2-.4h0v0S238.18,438,238.18,438.06Zm2.32.31-.2.07s0,0,0,0S240.46,438.35,240.5,438.37Zm-.13-.25a.09.09,0,0,1,.06,0s0,.06,0,.06,0,0,0,0,0,.08,0,.1,0,.05,0,.06,0,0,0,0-.14,0-.13,0,0,0-.07,0,0-.08-.05-.09,0,0,0,0,0,0,0,0a.13.13,0,0,0,.08,0h-.09s0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0v0C240.27,438.14,240.34,438.09,240.37,438.12Zm-2.56-.23v0h0S237.79,437.9,237.81,437.89Zm.07,0h0S237.88,437.87,237.88,437.9Zm0,0v0s.07,0,.1,0Zm2.32.23s.08-.08.12-.06S240.27,438.13,240.21,438.14Zm0-.11c.09,0,.13-.11.23-.14s0,0,0,.06-.12.05-.17.07.12,0,.18,0v0c-.06,0-.12.06-.21.07S240.2,438,240.17,438Zm-1.09-.71s.06,0,.06,0,.11,0,.17,0v0s0,0,0,0a2,2,0,0,1,.34,0v0s.06,0,.11,0,0,0,0,0,.06,0,.09,0,.09,0,.09.09,0,0-.05,0v0s.07,0,.08-.05,0,0,0,0h0a.43.43,0,0,0,0,.07s0,0,0,0-.18,0-.17.07,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0a.21.21,0,0,0-.14,0s0,0,0,0a.3.3,0,0,1-.21,0l-.05,0s-.13,0-.16,0,0,0,0,0,0,0,0,0a.16.16,0,0,1-.09.06v0s-.07,0-.08,0,0,0,0,0-.06,0-.08,0-.11.07-.16.11-.13,0-.16,0,.09,0,.13,0-.05,0-.07,0a.6.6,0,0,0,.16-.08c-.14,0-.25.14-.42.18a1.8,1.8,0,0,1,.41-.26s.07,0,.08,0a.53.53,0,0,0-.22.08s.07-.06.09-.09,0,0,.07,0,.11,0,.12-.08.09,0,.13,0S239.09,437.32,239.08,437.32Zm1.09.67s.05,0,.1-.06S240.22,438,240.17,438Zm-1.71-.34a.07.07,0,0,1,0-.06A0,0,0,0,1,238.46,437.65Zm1.71.29a.54.54,0,0,1,.18-.11s0,0,0,0h0a.09.09,0,0,0,.06,0C240.37,437.9,240.25,437.91,240.17,437.94Zm-.11-.35a.5.5,0,0,1,.14-.1v0l-.09,0a.06.06,0,0,0,.06,0s0,0,0,0,0,0,.08,0,0,0,0,0,0,0,0,0,0,.05.05.05a.37.37,0,0,0,0,.14,2,2,0,0,0-.21.11s0-.05,0,0,0-.06,0-.13,0,0,0,0-.06-.09-.09-.16a0,0,0,0,0,.06,0S240.06,437.55,240.06,437.59Zm-1.51,0s0,0,0,0,0,0,.06,0S238.53,437.58,238.55,437.6Zm1.72.19a.2.2,0,0,0-.09.09h0S240.26,437.83,240.27,437.79Zm-1.63-.26v0h0S238.67,437.53,238.64,437.53Zm.25,0c.05-.07.23-.07.3-.13a.73.73,0,0,0-.35.12S238.87,437.56,238.89,437.55Zm1,0s0,0,0,0h0Zm-.87-.17v0c.13,0,.3-.11.4-.07s0,0,0,0a1,1,0,0,0-.21,0C239.14,437.36,239.05,437.34,239,437.4Zm1,.13c.08,0,.11-.12.17-.06a.75.75,0,0,1-.2.1.09.09,0,0,1,.06-.08S240,437.52,240,437.53Zm0,0v0h-.06S239.94,437.53,240,437.52Zm-.76-.11h.05S239.18,437.39,239.2,437.41Zm.08,0h.05v0l-.05,0Zm.48,0,.05,0S239.75,437.34,239.76,437.36Zm-.15-.06s0,0,.08,0v0S239.62,437.28,239.61,437.3Z"/>
                            <path class="cls-41" d="M238.73,438.07l-.11,0v0c0-.05.09,0,.12,0a.05.05,0,0,1,0,0,.08.08,0,0,1,0,.11s0,0,0,0v0h0s0,0,0,0,0,.07,0,.1.08,0,.1,0l.05-.05s0,0,0,0,0,0,0,0h.13s-.05,0-.09,0a.13.13,0,0,1,.14-.05s0,0,0,0,.06,0,.07,0,0,0,0,0,0,0,0,0,0,0,.08,0v0h0a.25.25,0,0,0,.17,0s0,0,0,0,0,0,.06,0,0,0,0,0a.86.86,0,0,1,.21-.07,3.92,3.92,0,0,1-.36.16v0a1,1,0,0,0,.38-.17s.08,0,.1,0,0,0,0,0c.22-.07.4,0,.59-.06h-.38a2.52,2.52,0,0,1,.42-.15s0,0,0,.07,0,0,0,0,0,.08,0,.13a.06.06,0,0,1,0,.05c-.18.06-.28,0-.46,0h.45s0,0,0,.05,0,0,0,0,0,0-.06.05l0,0s-.07,0-.07.05,0,0-.06,0-.13,0-.21,0,.05,0,.09,0v0s-.12,0-.13,0-.12,0-.22,0-.06,0-.06,0l-.3.06s0,0,0,0a.31.31,0,0,0-.14.06s0,0,0,0-.09,0-.11.06,0,0,0,0,0,0,0,0,0,0,0,0,0,0-.05,0-.1,0-.11,0-.07,0-.09.05-.05,0-.06,0,0,0,0,0-.07,0-.07,0-.06,0-.08,0v0h0s0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0l-.36.1v0c0,.05,0,0,0,0h0v0s-.07,0-.12.07v0s0,0-.06,0,0,0,0,0,0,0,0,0-.1,0-.16.07,0,0,0,0,0,0,0,0,0,0,0,0,0-.12-.08-.24.07,0,.11-.05-.06,0-.11,0,0-.12-.05-.16h0s0,0,0,0h0c0-.09-.08-.21-.06-.3s0-.17-.08-.21,0-.05,0-.07h0c0-.05,0,0,0,0s0-.09,0-.13h0s0,0,0,0,0,0,0,0,0-.09,0-.14a.21.21,0,0,0,.07-.11s.05,0,.05,0,.06,0,0,0,.06,0,.09,0,0,0,0,0l.06,0s0,0,0,0l-.06,0s.11,0,.13,0,0,0,0,0,0,0,0,0,.06,0,.12,0,0,0,0,0,0,0,.08,0,.1.05.13.11l0,0s0,0,0,.07,0,0,0,0,0,0,0,0,0,0,.05,0a.75.75,0,0,1,0-.15h0s0,0,0,0,0,0,0,0l0,0s0,0,0-.05l.2-.11c.05,0,.12,0,.17,0s0,0,0,.05h0s0,.05,0,.05a.06.06,0,0,1,0,.08l0,.06a.17.17,0,0,0,0,.17c-.06,0-.18.06-.21.12a.7.7,0,0,0,.18-.05s0,0,0,0v0s0,0,.06,0,0,.07,0,.08a.18.18,0,0,0-.12,0s.06,0,.08,0,0,0,0,0,0,.06,0,.07S238.73,438.06,238.73,438.07Zm-.86.91s0,0,0-.08-.09,0-.1.07,0,0-.06,0,0,0,0,0l.15-.05s0,0,0,0S237.85,439,237.87,439Zm.16-.14s0,0,0,.06-.13,0-.11.06.06-.08.1,0,0,0,0,0,.06,0,.09,0,0,0,0-.05S238.07,438.82,238,438.84Zm.11,0h0s0,0,.05-.05S238.14,438.81,238.14,438.84Zm.27-.65.08,0s-.08,0-.1,0,0-.11-.06-.17,0,0,0,0,0-.06,0-.09-.06,0-.08-.06-.07,0-.1,0h-.05v0s-.05,0-.07,0-.07,0-.07.07l0,0a.24.24,0,0,1-.14.12s0,.05-.05,0,0,0,0,0l0,.05s0,0,0,0h0a.06.06,0,0,0,0,0h0c0,.1.08.2.1.28s0,.09.08.12,0,.05,0,.05,0,0,0,0,0,.05,0,0,0,.07,0,.12l.19-.08s0,0,0,0,0,0,0,0,.07,0,.1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0l0,0v0h0v0s0-.07.1-.05,0,0,0,0h0s0,0,0,0S238.44,438.28,238.41,438.19Zm-.23.6s0,0,.08,0S238.21,438.8,238.18,438.79Zm.09,0h0s.05,0,0-.05S238.28,438.76,238.27,438.76Zm-.61-.25s-.08,0-.07,0S237.67,438.55,237.66,438.51Zm-.07,0s0,0,0,0A.1.1,0,0,0,237.59,438.5Zm1,.09a.08.08,0,0,0-.07.07.41.41,0,0,0,.24-.06.56.56,0,0,1-.21,0S238.57,438.61,238.57,438.59Zm-1-.18.08,0s0,0-.06,0S237.52,438.39,237.52,438.41Zm1.28.17.32-.1A.71.71,0,0,0,238.8,438.58Zm.78.05h-.05S239.56,438.64,239.58,438.63Zm0,0h-.06v0Zm-.37-.18s0,0,0,0,0-.06,0,0,0,0,0,0,.09-.07.14-.05.05,0,0,0A.82.82,0,0,0,239.24,438.41Zm.45.07a.21.21,0,0,1,.11,0S239.7,438.44,239.69,438.48Zm-1.21-.24s0,0,0,0v0S238.46,438.22,238.48,438.24Zm.09,0s0,0,.06,0S238.56,438.21,238.57,438.24Zm1.24.23s.05,0,0,0S239.79,438.44,239.81,438.47Zm0-.1a.26.26,0,0,0-.13.07C239.77,438.42,239.86,438.42,239.85,438.37Zm-1.26-.26-.05,0v0s0,0,.06,0Zm1.14.24c.09,0,.16,0,.26,0C239.91,438.32,239.79,438.3,239.73,438.35Zm.68,0c-.08,0-.15,0-.2.09S240.38,438.36,240.41,438.31Zm-.29,0h0S240.1,438.3,240.12,438.32Zm-.22-.11s-.09,0-.08.05S239.9,438.24,239.9,438.21Zm.37.06.13,0S240.27,438.25,240.27,438.27Zm-.2-.09s0,0,0,0a1.82,1.82,0,0,1,.18-.06S240.08,438.13,240.07,438.18Zm0-.06h0S240.1,438.1,240.09,438.12Zm-1.42-.35c0,.05-.08.05-.12.07S238.62,437.79,238.67,437.77Zm-.49,0,.06,0s0,0,0,0S238.19,437.7,238.18,437.72Zm2.12.37s0,0,.06,0S240.32,438.08,240.3,438.09Zm-2.05-.41h0v0A.08.08,0,0,0,238.25,437.68Zm2.33.32-.21.06s0,0,0,0S240.53,438,240.58,438Zm-.13-.26.05,0s0,.06,0,.05,0,0,0,0,0,.09,0,.11,0,0,0,.06,0,0,0,0-.13,0-.13,0,0,0-.07,0,0-.09,0-.1,0,0,0,0,0,0,0,0a.08.08,0,0,0,.08,0h-.08s0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0v0S240.42,437.72,240.45,437.74Zm-2.57-.22v0h0S237.87,437.52,237.88,437.52Zm.07,0h0S238,437.5,238,437.53Zm0,0v0s.07,0,.09,0Zm2.31.24s.09-.08.12-.06S240.34,437.76,240.28,437.77Zm0-.12c.09,0,.13-.1.23-.13s0,0,0,.06-.11.05-.17.07.12,0,.18,0a.06.06,0,0,1,0,0c-.06,0-.12.06-.21.07S240.28,437.67,240.24,437.65Zm-1.08-.7s.06,0,.05,0,.12,0,.18,0v0s0,0,0,0h.34v0s0,0,.11,0,0,0,0,0,0,0,.08,0,.09,0,.1.1,0,0-.05,0v0s.07,0,.08,0,0,0,0,0,0,0,0,0l0,.07s0,0,0,0-.17,0-.16.06h0s0,0,0,0h0s0,0,0,0a.17.17,0,0,0-.14,0s0,0,0,0a.28.28,0,0,1-.2,0,.06.06,0,0,0,0,0c-.05,0-.13,0-.16,0s0,0,0,0,0,0,0,0-.05.05-.1.05v0s-.06,0-.07,0,0,0,0,0-.06,0-.08,0l-.16.11c0-.05-.13,0-.16,0a.3.3,0,0,1,.12,0s-.05,0-.06,0a.6.6,0,0,0,.16-.08c-.15,0-.26.14-.43.18a2.06,2.06,0,0,1,.41-.26s.07,0,.08,0a.48.48,0,0,0-.21.07s.06-.05.08-.08,0,0,.08,0,.11,0,.12-.08.08,0,.12,0A0,0,0,0,1,239.16,437Zm1.09.67s.05-.05.09-.06S240.29,437.61,240.25,437.62Zm-1.72-.35s0,0,0,0S238.56,437.27,238.53,437.27Zm1.72.3a.5.5,0,0,1,.17-.11s0,0,0,0h0a.06.06,0,0,0,0,0C240.45,437.53,240.33,437.54,240.25,437.57Zm-.11-.35a.32.32,0,0,1,.14-.1v0l-.1,0s0,0,.06,0,0,0,0,0,0,0,.07,0,0,0,0,0,0,0,0,0,0,.06,0,.05a.24.24,0,0,0,.05.14c-.1,0-.14.09-.22.12s0-.05,0,0,0-.06,0-.13,0,0,0,0-.07-.09-.1-.16.06,0,.06,0S240.13,437.18,240.14,437.22Zm-1.51,0s0,0,0,0,0,0,.06,0S238.61,437.21,238.63,437.23Zm1.71.19a.14.14,0,0,0-.08.09h0S240.33,437.46,240.34,437.42Zm-1.62-.26v0h0S238.74,437.15,238.72,437.16Zm.24,0c0-.07.24-.07.3-.13a.7.7,0,0,0-.34.12S238.94,437.18,239,437.18Zm1,0,0,0h0Zm-.87-.16h0c.13,0,.29-.1.4-.06s0,0,0,0a.78.78,0,0,0-.21,0C239.21,437,239.12,437,239.07,437Zm1,.13c.08,0,.11-.12.17-.06a.56.56,0,0,1-.19.09s0-.06.06-.08S240.08,437.14,240.07,437.16Zm0,0v0H240S240,437.16,240,437.15Zm-.76-.11h0S239.26,437,239.27,437Zm.09,0,0,0h0l-.05,0Zm.48,0h0S239.83,437,239.84,437Zm-.16-.05s0,0,.08,0v0S239.69,436.91,239.68,436.93Z"/>
                            <path class="cls-41" d="M238.09,437.61l-.11,0v0c0-.05.09,0,.12,0s0,0,0,0a.1.1,0,0,1,0,.11s0,0,0,0v0h0s0,0,0,0,0,.08,0,.11a.09.09,0,0,1,.1,0l.05-.06s0,0,0,0,0,0,0,0a.31.31,0,0,0,.13,0h-.09a.12.12,0,0,1,.14,0s0,0,0,0,0,0,.06,0,0,0,0,0v0a.11.11,0,0,0,.08,0h0s0,0,0,0a.17.17,0,0,0,.17,0s0,0,0,0,0,0,.06-.05,0,0,0,0a1,1,0,0,1,.22-.07,3.17,3.17,0,0,1-.37.15v0a1.07,1.07,0,0,0,.39-.18s.07,0,.09,0,0,0,0,0c.22-.08.41,0,.6-.06-.13,0-.26,0-.39,0a2.52,2.52,0,0,1,.42-.15s0,0,0,.08,0,0,0,0,0,.08,0,.12,0,0,0,.05c-.17.07-.28,0-.46,0H240s0,0,0,0,0,0,0,0,0,0-.06,0,0,0,0,0-.08,0-.08.06h-.06s-.13,0-.21,0,0,0,.09,0v0s-.12,0-.13,0-.11.05-.22,0-.06,0-.05.05l-.31.06h0l-.14.06s0,0,0,0-.09,0-.11.07,0,0,0,0a0,0,0,0,1,0,0s0,0,0,0,0,0,0,0-.1,0-.11,0-.07,0-.08.06-.06,0-.07,0,0,0,0,0a0,0,0,0,0-.07,0s-.05,0-.08,0v0h0s0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0a3.34,3.34,0,0,0-.36.1v0c0,.05,0,0,0,.05h0v0c0,.05-.07,0-.12.06v0s0,0-.06,0,0,0,0,0,0,0,0,0-.11,0-.17.07,0,0,0,0,0,0,0,0,0,0,0,0-.05-.12-.08-.23.07,0,.12-.06-.07.05-.12,0,0-.12,0-.17h0s0,0,0,0,0,0,0,0-.08-.2-.06-.29,0-.17-.08-.22,0,0,0-.06h0s0,0,0,0,0-.08,0-.13h0s0,0,0,0,0,0,0,0,0-.1,0-.14a.26.26,0,0,0,.07-.11s0,0,0,0,.06,0,.05,0,.06,0,.09,0,0,0,0,0l.05-.05s0,0,0,0l-.05,0s.1,0,.12,0,0,0,0,0,0,0,0,0,.07,0,.12,0,0,0,0,0,0,0,.08,0,.1.05.13.11h.05s0,0,0,.06l0,0s0,0,0,0,0,0,.05,0a.74.74,0,0,1,0-.15h0s0,0,0,0,0,0,0,0l0,0s0,0,0-.05l.19-.12a.54.54,0,0,0,.18,0s0,0,0,.05h0s0,.05,0,.05a.06.06,0,0,1,0,.08v.06a.17.17,0,0,0,0,.16c-.06.05-.18.06-.21.12s.12,0,.18,0,0,0,0,0v0s0,0,0,0a.07.07,0,0,0,0,.08s-.09,0-.11,0l.08,0s0,0,0,0,0,.07,0,.08S238.09,437.6,238.09,437.61Zm-.86.92s0,0,0-.08-.09,0-.1.06,0,0-.06,0,0,0,0,0,.12-.05.15-.05,0,0,0,0S237.21,438.55,237.23,438.53Zm.16-.14s0,0,0,.05-.12,0-.1.06.05-.07.09,0,0,0,0,0,.06,0,.09,0,0,0,0-.05S237.44,438.36,237.39,438.39Zm.11,0h0s0-.05.05-.06S237.5,438.35,237.5,438.38Zm.27-.65.08,0s-.08,0-.1,0,0-.12-.06-.17,0,0,0,0,0-.05,0-.08-.06,0-.08-.06-.06,0-.1,0l0,0v0a.09.09,0,0,1-.07,0c0,.05-.06,0-.07.07l0,0a.21.21,0,0,1-.14.12s0,.05-.05,0,0,0,0,0l-.05,0s0,0,0,0h0s0,0,0,.06h0c0,.1.08.21.1.29s0,.09.08.12a0,0,0,0,0,0,0s0,0,0,0,0,0,0,0,0,.06,0,.11l.19-.08s0,0,0,0v0s.07,0,.1,0,0,0,0,0l0,0s0,0,0,0,0,0,0,0h0s0,0,0,0l0,0v0s.05-.07.1-.06,0,0,0,0,0,0,0,0,0,0,0,0A3.38,3.38,0,0,1,237.77,437.73Zm-.23.61s.05,0,.08,0S237.57,438.34,237.54,438.34Zm.1,0,0,0s0,0,0,0A.09.09,0,0,0,237.64,438.31Zm-.62-.26s-.08,0-.07,0S237,438.09,237,438.05Zm-.06,0s0,0,0,0A0,0,0,0,0,237,438.05Zm1,.09a.11.11,0,0,0-.07.06.34.34,0,0,0,.25-.06.68.68,0,0,1-.22.05S237.93,438.16,237.93,438.14Zm-1-.18s0,0,.07,0,0,0-.06,0S236.88,437.94,236.89,438Zm1.27.16.32-.09A.73.73,0,0,0,238.16,438.12Zm.78.06h0S238.92,438.19,238.94,438.18Zm0,0v0l-.05,0v0Zm-.37-.19s0,0,0,.05,0-.06.05,0,0,0,0,0,.09-.06.14,0,0,0,0-.05A1.46,1.46,0,0,0,238.6,438Zm.45.07a.14.14,0,0,1,.11,0S239.06,438,239.05,438Zm-1.21-.24s0,0,0,0v0S237.82,437.76,237.84,437.78Zm.09,0s0,0,.06,0S237.93,437.75,237.93,437.78Zm1.24.23s.05,0,0,0S239.15,438,239.17,438Zm.05-.09a.23.23,0,0,0-.14.07S239.22,438,239.22,437.92Zm-1.27-.26,0,0v0s0,0,.05,0Zm1.14.24a2.28,2.28,0,0,1,.26,0C239.28,437.87,239.16,437.84,239.09,437.9Zm.68,0c-.08,0-.15,0-.2.1S239.74,437.9,239.77,437.85Zm-.29,0h0S239.46,437.85,239.48,437.86Zm-.22-.1s-.09,0-.08,0S239.26,437.79,239.26,437.76Zm.37.06.13-.05S239.64,437.79,239.63,437.82Zm-.19-.1s0,0,0,0l.18-.06C239.57,437.69,239.44,437.67,239.44,437.72Zm0-.05h0S239.46,437.64,239.46,437.67Zm-1.43-.36c0,.05-.08.05-.12.07S238,437.33,238,437.31Zm-.48,0,0,0s0,0,0,0S237.55,437.24,237.55,437.27Zm2.11.36s0,0,.06,0S239.68,437.62,239.66,437.63Zm-2-.4h0v0S237.61,437.21,237.61,437.23Zm2.33.31-.2.07s0,0,0,0S239.9,437.52,239.94,437.54Zm-.13-.25a.06.06,0,0,1,.05,0s0,.06,0,.05,0,0,0,0,0,.09,0,.1,0,.05,0,.06,0,0,0,0-.13,0-.13,0,0,0-.06,0,0-.09-.05-.1,0,0,0,0,0,0,0,0,.05,0,.09,0a.08.08,0,0,0-.09,0s0-.05,0,0,0,0,0,0,0,0,0,0,0,0,0,0v0C239.71,437.32,239.78,437.27,239.81,437.29Zm-2.57-.23v0h0S237.23,437.07,237.24,437.06Zm.07,0-.05,0S237.31,437.05,237.31,437.07Zm0,0v0a.1.1,0,0,1,.09,0Zm2.31.23s.09-.08.12-.05S239.7,437.3,239.64,437.31Zm0-.11c.08,0,.12-.1.22-.13s0,0,0,.06-.12,0-.18.06.13,0,.18,0v.05c-.07,0-.12.05-.21.06S239.64,437.22,239.61,437.2Zm-1.09-.7s.06,0,0,0,.12,0,.18,0v0s0,0,0,0a1.93,1.93,0,0,1,.34,0v0s.06,0,.11,0,0,0,0,0,.06,0,.08,0,.09,0,.1.1,0,0,0,0v0s.07,0,.09-.05,0,0,0,0,0,0,0,0l.05.07s0,0,0,0-.18,0-.17.07,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0a.21.21,0,0,0-.14,0,.05.05,0,0,1,0,0,.27.27,0,0,1-.2,0,0,0,0,0,0-.05,0s-.13,0-.16,0,0,0,0,0,0,0,0,0,0,.05-.1.06v0s-.06,0-.07,0,0,0,0,0-.06,0-.08,0l-.16.11s-.13,0-.16,0a.59.59,0,0,1,.13,0s-.06,0-.07,0a.4.4,0,0,0,.16-.08c-.15,0-.26.14-.43.18a2.36,2.36,0,0,1,.41-.25s.07,0,.08,0a.66.66,0,0,0-.21.08s.07-.05.08-.09,0,0,.08,0,.11,0,.12-.07.09,0,.13,0Zm1.09.66a.15.15,0,0,1,.09-.05S239.66,437.15,239.61,437.16Zm-1.71-.34a.14.14,0,0,1,0-.06A0,0,0,0,1,237.9,436.82Zm1.71.29a1.26,1.26,0,0,1,.17-.11s0,0,0,0h0l.05,0C239.81,437.07,239.69,437.08,239.61,437.11Zm-.11-.35a.56.56,0,0,1,.14-.09v0l-.09,0s0,0,.05,0,0,0,0,0,0,0,.07,0,0,0,0,0,0,0,0,0,0,0,.06,0a.23.23,0,0,0,0,.14,1.55,1.55,0,0,0-.22.12s0-.06,0,0,0-.07-.05-.14h0c0-.09-.07-.1-.1-.17s.07,0,.06,0S239.49,436.73,239.5,436.76Zm-1.51,0s0,0-.05,0,0,0,.07,0S238,436.75,238,436.77Zm1.72.19s-.08.06-.09.09h0S239.69,437,239.71,437Zm-1.63-.26v0h0S238.1,436.7,238.08,436.7Zm.24,0c.05-.06.24-.07.3-.13a.82.82,0,0,0-.34.12S238.3,436.73,238.32,436.72Zm1,0s0,0,0,0h0Zm-.87-.16h0c.13,0,.29-.11.4-.07s0,0,0,0a.78.78,0,0,0-.21,0C238.57,436.53,238.48,436.51,238.43,436.58Zm1,.13c.07,0,.1-.13.16-.07a.49.49,0,0,1-.19.1s0-.06.06-.08S239.44,436.69,239.44,436.71Zm-.05,0v0s0,0-.06,0S239.38,436.71,239.39,436.7Zm-.75-.11,0,0S238.62,436.57,238.64,436.59Zm.08,0,.05,0h-.06Zm.48-.05h.05S239.19,436.52,239.2,436.53Zm-.16,0s.06,0,.09,0v0S239.05,436.45,239,436.48Z"/>
                        </g>
                        <text class="cls-43" transform="translate(232.67 443.62) rotate(-27.89)">by:</text>
                        </g>
                        <polygon class="cls-44" points="388.43 479.98 253.65 479.98 252.86 465.21 252.79 463.79 245.63 328.44 387.7 330.63 388.43 479.98"/>
                        <g class="cls-45">
                        <g class="cls-46">
                            <path class="cls-47" d="M454.2,335.12c-80,21.56-172.3,3.14-223.78,0S170,331.77,170,331.77l3.47,19s90.94-7.43,171.53,0,109.21-4.58,109.21-4.58Z"/>
                            <path class="cls-47" d="M454.2,350.81s-27.7,7.53-118,4.94-164,3.4-164,3.4l1.42,6.53s79.27-6.26,169-7.44,111.62-5,111.62-5Z"/>
                            <path class="cls-47" d="M454.2,426.26s-27.58,3.24-100.64-4.37-129.26-5.14-129.26-5.14,90.42,2,147.24,9.18,82.66,7.24,82.66,7.24Z"/>
                            <path class="cls-47" d="M454.2,268.9s1.35,3.92-88.13-6.67-205.82-1.8-205.82-1.8l-2.61-14.36a1401.23,1401.23,0,0,0,176.43,9.5c94.29-1.17,120.13,7.84,120.13,7.84Z"/>
                            <path class="cls-47" d="M454.2,252.83s-36,2-134.15-11.36-164.63-6.8-164.63-6.8l-2.12-10.12s90.14-7,186,5.55,115,13.32,115,13.32Z"/>
                            <path class="cls-47" d="M454.2,274.38s-24.18,2.29-120.13-7.44-172.88-1-172.88-1l.43,2.56s68.84-8.65,139.8-3.29S454.2,278.69,454.2,278.69Z"/>
                            <path class="cls-47" d="M454.2,282.67s-25.84-.71-99.86-8-150.93,10-167.35,22.62,33.68,40.87,99.21,29.63,69.62-13.84,102.36-9.66,65.64,0,65.64,0V315s-20.54,5-62.25,0S280,334,238.51,327.42s-57.77-21.16-35.12-34.75,115.3-24,171.81-14,79,7.19,79,7.19Z"/>
                            <path class="cls-47" d="M173.1,448.5s70.12-7.1,155.72,7.56S454.2,470.84,454.2,470.84v16s-7.13-1.26-115-13-167.55-4.78-167.55-4.78Z"/>
                            <path class="cls-47" d="M168.29,478.3s117.51-10.83,193.82,0,92.09,15.2,92.09,15.2v12.25s-42-9-144.11-9.26-145.18,5.23-145.18,5.23Z"/>
                            <path class="cls-47" d="M164.41,509.67s148.73-13.67,211.08.53S479.17,543,361.14,579.53s-211.6,53.55-211.6,53.55l-1.28-3s227.3-49,259.1-70.65-1.69-46.9-66.42-52.2-179.81,8.3-179.81,8.3Z"/>
                            <path class="cls-47" d="M162.11,520.77s62.45-12.18,133.77-11.1S401.58,526,403.07,540.48,338,584.75,250,599.66s-96.23,13.78-96.23,13.78l.06-3.23S261,605.5,328.32,575.53s78.8-52.15-13.44-60-154.28,9.6-154.28,9.6Z"/>
                            <path class="cls-47" d="M174.46,377s15.54-27.11,128.31-5.29,148.49,28.18,137.87,41.7-93.41-6.28-179-7.2-79.64-27.3-29-29.59,114.78,9.95,150,20.68-110,1-135.62,0-27.31-9.72-27.31-9.72,4.42,5,50.47,9.14,101.35,3.19,100.23,0-104.36-24.18-145-17.34-21.94,25.07,44.78,25.88,160.62,19.23,166.2,7.95-62.86-27.69-124.24-37.7-135.84,9.14-135.84,9.14Z"/>
                            <path class="cls-47" d="M454.2,437.4s-9.38.26-105.59-7.57-174.15,7.57-174.15,7.57l-.56,3.92s98-11.6,171.6-8.15,108.7,15.21,108.7,15.21Z"/>
                            <path class="cls-47" d="M454.2,530.51s-2.11,32.41-104.37,68.7S208.3,633.08,208.3,633.08h75.54s33.79-23.06,77.3-35.4S454.2,562.8,454.2,562.8Z"/>
                            <path class="cls-47" d="M454.2,566.15s-1.17,12.92-65.81,32.31-74.34,34.62-74.34,34.62h24.28s19.17-20.9,55.16-30.89S454.2,587.3,454.2,587.3Z"/>
                        </g>
                        <g class="cls-48">
                            <path class="cls-49" d="M342.59,443.07s65.37,11.2,103.08,12.78v7.46s-3.87-5.23-31.75-8.24S343.1,443.9,343.1,443.9Z"/>
                            <path class="cls-49" d="M344,475.94s30.16,5.19,59.92,9.59,39,7.85,39,7.85v1.24a465.13,465.13,0,0,0-51.54-9.34C361.15,481.43,344,475.94,344,475.94Z"/>
                            <path class="cls-49" d="M442.92,437.28s-20.8-1.93-51.54-3.71-50.15-5.51-76.57-5.8c0,0,55.09,3.83,76.57,6.76s51.54,4.58,51.54,4.58Z"/>
                            <path class="cls-49" d="M338.47,505.18s57.77,3.91,83.19,24.43C421.66,529.61,393.35,510.38,338.47,505.18Z"/>
                            <path class="cls-49" d="M395,535.64c-8.22-12.54-57.32-23.4-57.32-23.4S384,517,395,535.64Z"/>
                            <path class="cls-49" d="M184.7,331.65s55.53,4.2,102.68,10.73,84,2.84,84,2.84c-74.5-1.64-101.79-7.57-134-10.37S184.7,331.65,184.7,331.65Z"/>
                            <path class="cls-49" d="M428.18,579.4s-23.33,8.1-54.86,21.74-50.79,25.15-50.79,25.15,33.66-19.39,57.75-27S428.18,579.4,428.18,579.4Z"/>
                            <path class="cls-49" d="M424.71,556.56A232.33,232.33,0,0,1,393.45,579S413.45,568.55,424.71,556.56Z"/>
                            <path class="cls-49" d="M179.62,223.75s98.18-1,160.22,8.45,103.08,9.4,103.08,9.4-34.44-1.82-76-7.59S355.87,222.36,179.62,223.75Z"/>
                        </g>
                        </g>
                        <path class="cls-50" d="M387.7,330.63c25.42-19.2,58-65.08,81.1-141.34,37.16,83.78,83.3,141.34,83.3,141.34L549.18,480H388.42Z"/>
                        <g class="cls-51">
                        <g class="cls-46">
                            <path class="cls-47" d="M618.24,279.38c-80,21.55-172.3,3.14-223.78,0S334,276,334,276l3.48,19s90.94-7.43,171.52,0,109.21-4.59,109.21-4.59Z"/>
                            <path class="cls-47" d="M618.24,295.07s-27.7,7.53-118,4.93-164,3.41-164,3.41l1.42,6.52s79.27-6.25,169-7.43,111.62-5,111.62-5Z"/>
                            <path class="cls-47" d="M618.24,370.52s-27.58,3.24-100.64-4.37S388.35,361,388.35,361s90.41,2,147.23,9.18,82.66,7.24,82.66,7.24Z"/>
                            <path class="cls-47" d="M618.24,213.15s1.35,3.92-88.13-6.66-205.81-1.8-205.81-1.8l-2.61-14.37a1399.81,1399.81,0,0,0,176.42,9.51c94.3-1.17,120.13,7.84,120.13,7.84Z"/>
                            <path class="cls-47" d="M618.24,197.09s-36,2-134.15-11.37-164.63-6.79-164.63-6.79l-2.12-10.12s90.14-7,186,5.55,115,13.32,115,13.32Z"/>
                            <path class="cls-47" d="M618.24,218.64s-24.17,2.29-120.13-7.44-172.87-1-172.87-1l.43,2.56s68.84-8.65,139.79-3.29S618.24,223,618.24,223Z"/>
                            <path class="cls-47" d="M618.24,226.93s-25.83-.71-99.86-8-150.93,10-167.35,22.62,33.68,40.87,99.21,29.63,69.63-13.84,102.36-9.66,65.64,0,65.64,0v-2.26s-20.54,5-62.25,0-111.9,19-153.44,12.44-57.77-21.15-35.11-34.74,115.3-24,171.81-14,79,7.19,79,7.19Z"/>
                            <path class="cls-47" d="M337.14,392.76s70.13-7.1,155.72,7.55,125.38,14.78,125.38,14.78v16s-7.13-1.26-115-13-167.54-4.78-167.54-4.78Z"/>
                            <path class="cls-47" d="M332.33,422.56s117.52-10.83,193.82,0,92.09,15.2,92.09,15.2V450s-42-9-144.1-9.26S329,446,329,446Z"/>
                            <path class="cls-47" d="M328.45,453.93s148.73-13.67,211.09.53,103.67,32.77-14.36,69.33-211.59,53.55-211.59,53.55l-1.28-3s227.29-49,259.09-70.66-1.68-46.89-66.41-52.19-179.81,8.3-179.81,8.3Z"/>
                            <path class="cls-47" d="M326.16,465s62.44-12.18,133.77-11.1,105.69,16.32,107.18,30.81S502.06,529,414.05,543.92s-96.23,13.78-96.23,13.78l.07-3.23s107.16-4.71,174.47-34.68,78.81-52.15-13.43-60-154.29,9.6-154.29,9.6Z"/>
                            <path class="cls-47" d="M338.5,321.24S354,294.13,466.81,316s148.5,28.18,137.87,41.7-93.41-6.28-179-7.2-79.64-27.3-29-29.59,114.79,9.95,150,20.68-110,1-135.62,0-27.31-9.72-27.31-9.72,4.43,5,50.47,9.14,101.35,3.19,100.24,0-104.36-24.18-145-17.34-21.95,25.07,44.77,25.88,160.63,19.22,166.21,7.95-62.86-27.69-124.24-37.71-135.84,9.15-135.84,9.15Z"/>
                            <path class="cls-47" d="M618.24,381.66s-9.38.26-105.58-7.58-174.16,7.58-174.16,7.58l-.56,3.91s98-11.59,171.6-8.14,108.7,15.2,108.7,15.2Z"/>
                            <path class="cls-47" d="M618.24,474.77s-2.1,32.41-104.37,68.7-141.53,33.87-141.53,33.87h75.54s33.79-23.06,77.3-35.4,93.06-34.88,93.06-34.88Z"/>
                            <path class="cls-47" d="M618.24,510.41s-1.16,12.91-65.81,32.31-74.34,34.62-74.34,34.62h24.28s19.17-20.9,55.16-30.9,60.71-14.89,60.71-14.89Z"/>
                        </g>
                        <g class="cls-48">
                            <path class="cls-49" d="M506.63,387.32S572,398.53,609.71,400.11v7.46s-3.86-5.24-31.75-8.24-70.82-11.17-70.82-11.17Z"/>
                            <path class="cls-49" d="M508,420.2s30.17,5.19,59.92,9.58,39,7.86,39,7.86v1.24a462.81,462.81,0,0,0-51.55-9.34C525.19,425.69,508,420.2,508,420.2Z"/>
                            <path class="cls-49" d="M607,381.54s-20.8-1.93-51.55-3.71-50.14-5.52-76.56-5.8c0,0,55.08,3.82,76.56,6.76S607,383.36,607,383.36Z"/>
                            <path class="cls-49" d="M502.51,449.44s57.77,3.9,83.2,24.43C585.71,473.87,557.4,454.64,502.51,449.44Z"/>
                            <path class="cls-49" d="M559,479.9c-8.23-12.54-57.33-23.4-57.33-23.4S548.05,461.25,559,479.9Z"/>
                            <path class="cls-49" d="M348.74,275.91s55.53,4.2,102.68,10.73,84,2.83,84,2.83c-74.51-1.63-101.79-7.56-134-10.36S348.74,275.91,348.74,275.91Z"/>
                            <path class="cls-49" d="M592.22,523.66s-23.33,8.1-54.86,21.74-50.79,25.15-50.79,25.15,33.66-19.39,57.75-27S592.22,523.66,592.22,523.66Z"/>
                            <path class="cls-49" d="M588.75,500.82a232.56,232.56,0,0,1-31.26,22.48S577.5,512.81,588.75,500.82Z"/>
                            <path class="cls-49" d="M343.67,168s98.18-1,160.21,8.44S607,185.86,607,185.86s-34.45-1.82-76-7.59S519.91,166.62,343.67,168Z"/>
                        </g>
                        </g>
                        <path class="cls-52" d="M245.63,330.63c25.42-19.2,58-68,81.11-144.25C363.89,270.16,386,307.32,410,330.63Z"/>
                        <path class="cls-53" d="M290.92,407.76l95.2-2.27c-7.14,4-15.78,4.11-24,4.13C338.37,409.69,314.59,409.76,290.92,407.76Z"/>
                        <path class="cls-53" d="M419.38,401.85c3.47-2.63,78.84-1.16,114.63-1.73-8,3.94-17.77,4-27,4C480.17,404.05,446.1,404,419.38,401.85Z"/>
                        <path class="cls-53" d="M319.3,463.53c-5.95,2.91-13.15,2.41-20,2.4-15.48,0-31-.08-46.43-.84l-.05-1C275,463.69,297.14,463.89,319.3,463.53Z"/>
                        <path class="cls-53" d="M395.42,427.73c5.94-2.91,13.15-2.41,20-2.4,15.48.05,31,.08,46.43.85l.06,1C439.76,427.58,417.58,427.38,395.42,427.73Z"/>
                        <path class="cls-53" d="M443.44,277.89c5.29-2.91,11.69-2.4,17.8-2.39,13.76,0,27.53.07,41.27.84l0,1C482.85,277.74,463.14,277.54,443.44,277.89Z"/>
                        <path class="cls-53" d="M332.6,356.88c6.95-.82,34-.55,51-.82-3.81,1.87-8.44,1.91-12.84,1.9C358,357.93,345.29,357.9,332.6,356.88Z"/>
                        <path class="cls-53" d="M371.85,440.86c-15.18.44-32.07.26-45.55-.24,8.94-.53,18.19-1.9,27.48-2.45C360.76,437.75,367.73,437.36,371.85,440.86Z"/>
                        <path class="cls-53" d="M506.15,339.81c-15.19.45-32.07.26-45.55-.24,8.94-.53,18.19-1.89,27.48-2.45C495.06,336.71,502,336.32,506.15,339.81Z"/>
                        <path class="cls-53" d="M317,448.78a157.44,157.44,0,0,0-44.48.47Q294.79,449.85,317,448.78Z"/>
                        <path class="cls-53" d="M549.13,358a106.8,106.8,0,0,0-36.59.47Q530.83,359.11,549.13,358Z"/>
                        <path class="cls-53" d="M357,426a133.26,133.26,0,0,1-42.41.35Z"/>
                        <path class="cls-53" d="M263,425.34c-4.05.67-10.93,1.17-12.11,2.37l-.13-2.37C254.7,425.44,259,425.24,263,425.34Z"/>
                        <path class="cls-53" d="M294.64,382.47l23.62-.42A50.55,50.55,0,0,1,294.64,382.47Z"/>
                        <path class="cls-53" d="M406.2,338.08l23.62-.43A50.69,50.69,0,0,1,406.2,338.08Z"/>
                        <path class="cls-53" d="M358.89,464l23.62-.43A50.69,50.69,0,0,1,358.89,464Z"/>
                        <path class="cls-53" d="M387.93,379.2c-5.1,1.28-10.5.28-16,1,5.64.94,15.73.55,16,2.55C387.92,381.54,388,380.82,387.93,379.2Z"/>
                        <path class="cls-53" d="M267,356.71l59.11,0c-16.11,3.55-31.47,1.08-49.54,1.56A28.61,28.61,0,0,1,267,356.71Z"/>
                        <path class="cls-53" d="M413.46,358.17l59.1,0c-16.11,3.55-31.46,1.08-49.53,1.56A28.61,28.61,0,0,1,413.46,358.17Z"/>
                        <path class="cls-53" d="M497.51,427.73l52.35-.19c-14.28,3.61-27.87,1.2-43.88,1.76A22.64,22.64,0,0,1,497.51,427.73Z"/>
                        <path class="cls-53" d="M402.44,378.65c15.18-.45,30.36.68,45.55.24-8.94.53-18.19,1.89-27.48,2.45C413.53,381.75,406.56,382.14,402.44,378.65Z"/>
                        <path class="cls-53" d="M507.44,462.91c12-.87,24,1.29,36,.42-7.07.78-14.42.94-21.77,1.75C516.11,465.69,510.6,466.28,507.44,462.91Z"/>
                        <path class="cls-53" d="M498.06,311.21c8.52-1.34,16.95.35,25.48-1-5,1-10.29,1.5-15.53,2.59C504.08,313.63,500.16,314.43,498.06,311.21Z"/>
                        <path class="cls-53" d="M405.27,462.86c8.53-1.34,17,.35,25.48-1-5,1.05-10.29,1.5-15.52,2.59C411.29,465.29,407.37,466.08,405.27,462.86Z"/>
                        <path class="cls-30" d="M246.4,343v-3.37l228-142.72L552.1,330.63,549.18,480H530.36l-4.54-155.91L472.4,250.59s-30.28,61.89-84.61,99.22Z"/>
                        <path class="cls-54" d="M476.82,163.57C463.5,223.63,428.5,298.41,379.28,333.3l-64.8-.35L233,332.51a95.79,95.79,0,0,0,11.13-10.68,217.08,217.08,0,0,0,16.41-20.27q5-6.94,10.59-15.74c2.52-4,5.09-8.19,7.64-12.43,1.21-2,2.43-4.05,3.63-6.1,22.77-38.51,44.34-80.91,44.34-80.91s19-.92,51.3-5.21C403.6,177.81,437.46,172.35,476.82,163.57Z"/>
                        <path class="cls-55" d="M476.82,163.57c11.78,30.34,24.79,62.09,40.56,90.56s34.17,54,59.92,73.88L575,332.09c-6.5.65-18.57-.64-22.92-1.46-24.52-18.58-71-97.29-82.51-139.57C473.14,178.71,476.82,163.57,476.82,163.57Z"/>
                        <path class="cls-56" d="M481.27,174.92c-1.57,7.06-2.3,8.7-4.45,16.19C460.65,247.43,424.94,310,381.5,340.83l-2.22-7.53c47.57-33.72,83.28-110.47,97.54-169.73C477.58,166.16,481.27,174.92,481.27,174.92Z"/>
                        <path class="cls-56" d="M577.3,328,575,332.09c-25.75-19.92-48.19-49.49-63.95-78-14.09-25.41-25.95-53.44-36.72-80.74,1.47-5.69,2.48-9.82,2.48-9.82,11.77,30.34,24.78,62.09,40.55,90.56S551.57,308.09,577.3,328Z"/>
                        <polygon class="cls-57" points="233 332.51 234.52 339.55 381.5 340.83 379.28 333.3 233 332.51"/>
                        <path class="cls-57" d="M355.3,334.64h-7.23c29.67-29.51,63.83-74.19,86-125.09C414.47,265.42,381.5,311.2,355.3,334.64Z"/>
                        <path class="cls-57" d="M324.61,334.64h-7.23a315.87,315.87,0,0,0,84.23-123.56C383,270.47,351.27,313.39,324.61,334.64Z"/>
                        <path class="cls-57" d="M294.44,334.64h-7.22c29.81-27.57,63-74.19,85.18-125.09C352.79,265.42,320.18,315.57,294.44,334.64Z"/>
                        <path class="cls-57" d="M264.81,334.64h-9.39c22-19.55,45.86-42.87,89.53-125.09C301.28,302.94,285.59,315.06,264.81,334.64Z"/>
                        <path class="cls-30" d="M381.65,209.36c2.55-9,1.78-19.06-2.94-27.12-.22-.37-.44-.72-.67-1.07-32.3,4.29-51.3,5.21-51.3,5.21s-21.57,42.4-44.34,80.91c.05,2.23-.53,4.27-2.36,5.49a4.93,4.93,0,0,1-1.27.61c-2.55,4.24-5.12,8.41-7.64,12.43a71.63,71.63,0,0,1-10.59,15.74,217.08,217.08,0,0,1-16.41,20.27A95.79,95.79,0,0,1,233,332.51l8.85.05,4.55,7.1L249,391.93c5.74-6.24,9.11-10.62,14.85-16.68s13.34-14.62,15.85-22.58c1.38-4.42,2.09-13.44,2-12.71,0,0-2.16-5.32,2.26-7.16l25,.15c7.16-.86,13.22-5.57,16.82-9.06,6.37-6.19,8.74-15.66,8.74-15.66s12.7-.65,17.56-1.82A38.92,38.92,0,0,0,382,270.92c13-3.66,23-18.3,22.88-31.83S394.74,212.75,381.65,209.36Z"/>
                        <path class="cls-58" d="M475.94,267.55c-26.81-4.49-45.79,26-32.32,60s56.63,18.64,64.09-6.26S489.82,269.88,475.94,267.55Z"/>
                        <path class="cls-59" d="M478.65,267.55c-26.81-4.49-45.69,24.92-32.22,58.87s55.9,21.73,62-8.09C513.64,293,492.53,269.88,478.65,267.55Z"/>
                        <path class="cls-60" d="M478.29,273.24c-22.91-3.84-37,22.78-25.52,51.8s43.23,11.78,49.6-9.49S490.15,275.23,478.29,273.24Z"/>
                        <path class="cls-61" d="M457.91,279.47c17.88-14.42,34.11,7.49,36.34,31.25S475.08,341,464.59,338.84,436,303.49,457.91,279.47Z"/>
                        <path class="cls-62" d="M447.58,307.61l51.67-4.7s2.89,1.55.56,4.7c0,0-32.2-.26-51.63,5.43A11,11,0,0,1,447.58,307.61Z"/>
                        <path class="cls-63" d="M470.75,309.05s5.2,16.41,2,30.19c0,0,3.33,2.61,4.89-1.13,0,0-2.56-19.17-1.5-29.56Z"/>
                        <path class="cls-64" d="M476.05,310.32s-2.88-2.71-4.92.16l-.38-1.43,5.42-.5Z"/>
                        <path class="cls-64" d="M499.81,307.61l3.67,2.48a16.83,16.83,0,0,0,0-5.7l-3.67-1.48S501,306.08,499.81,307.61Z"/>
                        <path class="cls-65" d="M476.17,305s-1.61,3.58-6.72.78c0,0-1.09-11.59-3.63-15.06l2.63-2.75a30.68,30.68,0,0,0-.45-7.68,13.88,13.88,0,0,0-2.18-5.44s6-3,9.3,0c0,0,0,1,0,2.81C475.14,282.74,475.3,293.92,476.17,305Z"/>
                        <path class="cls-64" d="M475.12,277.67s-4.42-1.33-6.92,2.36l-.2.27a13.88,13.88,0,0,0-2.18-5.44s6-3,9.3,0C475.12,274.86,475.11,275.89,475.12,277.67Z"/>
                        <path class="cls-66" d="M465.82,290.73l2.63-6.05S471.69,288.52,465.82,290.73Z"/>
                        <path class="cls-67" d="M484.69,365.79c37.74,24.13,27.48,114.63,27.48,114.63l-10,.05s1.69-25.61.54-43.78a211.46,211.46,0,0,0-3.85-31.33c-5.42-25.4-14.32-35.69-21.63-40.19-6.64-4.1-12-3.51-12-3.51C468.8,361.42,477.44,360.92,484.69,365.79Z"/>
                        <polygon class="cls-68" points="512.55 430 502.17 429.11 501.07 418.89 510.6 415.74 512.55 430"/>
                        <polygon class="cls-68" points="507.97 403.44 499.23 407.46 498.81 405.36 507 399.99 507.97 403.44"/>
                        <path class="cls-68" d="M498.58,380.32l-7.08,2.06s-7.76-18.6-23.07-20.59C468.43,361.79,485.4,359.77,498.58,380.32Z"/>
                        <path class="cls-69" d="M416.48,480.1l85.64.37s13-118.15-36.22-118.74C403.65,361,416.48,480.1,416.48,480.1Z"/>
                        <path class="cls-70" d="M343.89,377.18c19.13-6.06,35.89,19,29.31,49.63s-39.52,20.76-47.34-.32S334,380.31,343.89,377.18Z"/>
                        <path class="cls-71" d="M341.92,377.39c19.12-6.06,35.71,18,29.13,48.68s-38.69,23.39-46-2.08C318.83,402.34,332,380.53,341.92,377.39Z"/>
                        <path class="cls-72" d="M342.73,382.32c16.34-5.18,29.18,16.87,23.56,43.05s-30.4,13.72-37.08-4.29S334.27,385,342.73,382.32Z"/>
                        <path class="cls-73" d="M358.18,386.11C343.77,375,334,395.36,334.67,416.23s16.88,24.86,24.32,22.1S376.44,405.26,358.18,386.11Z"/>
                        <path class="cls-74" d="M368.41,409.78l-38.14.05s-2,1.58.05,4.13c0,0,23.45-2.8,38.17.6A11.37,11.37,0,0,0,368.41,409.78Z"/>
                        <path class="cls-75" d="M347.31,409.81s1.51,3,5,.14c0,0-.32-10.18,1.2-13.4l-2.18-2.19a32.45,32.45,0,0,1-.41-6.72,13.42,13.42,0,0,1,1.08-4.91s-4.64-2.12-6.79.74l.27,2.45C345.93,390.34,346.88,400.08,347.31,409.81Z"/>
                        <path class="cls-76" d="M351.64,412.89s-2.22,14.7,1.41,26.45c0,0-2.17,2.54-3.67-.59,0,0,0-16.9-1.73-25.86Z"/>
                        <path class="cls-64" d="M347.9,414.42s1.84-2.59,3.6-.25l.14-1.28h-4Z"/>
                        <path class="cls-64" d="M345.46,385.92a4.23,4.23,0,0,1,5.27,1.5l.17.22a13.42,13.42,0,0,1,1.08-4.91s-4.64-2.12-6.79.74Z"/>
                        <path class="cls-64" d="M330.32,414l-2.45,2.46a18,18,0,0,1-.54-5l2.54-1.58S329.32,412.73,330.32,414Z"/>
                        <path class="cls-77" d="M353.49,396.55,351,391.49S349,395.09,353.49,396.55Z"/>
                        <path class="cls-70" d="M279.39,377.09c19.21-5.76,35.58,19.55,28.53,50.08s-39.84,20.15-47.33-1.05S269.44,380.07,279.39,377.09Z"/>
                        <path class="cls-78" d="M277.41,377.28c19.22-5.77,35.42,18.58,28.37,49.12s-39,22.78-46-2.79C253.94,401.86,267.46,380.26,277.41,377.28Z"/>
                        <path class="cls-79" d="M278.14,382.21c16.42-4.92,28.92,17.32,22.9,43.41s-30.62,13.26-37-4.86S269.64,384.76,278.14,382.21Z"/>
                        <path class="cls-73" d="M293.54,386.24c-14.24-11.34-24.31,8.88-24,29.75s16.49,25.12,24,22.48S311.49,405.68,293.54,386.24Z"/>
                        <path class="cls-80" d="M303.4,410.07l-38.14-.54s-2,1.55,0,4.13c0,0,23.5-2.44,38.16,1.19A11.4,11.4,0,0,0,303.4,410.07Z"/>
                        <path class="cls-81" d="M282.3,409.77s1.46,3,5,.22c0,0-.16-10.18,1.42-13.38l-2.15-2.22a32.18,32.18,0,0,1-.3-6.73,13.54,13.54,0,0,1,1.14-4.89s-4.6-2.19-6.79.64c0,0,.09.89.23,2.45C281.22,390.28,282,400,282.3,409.77Z"/>
                        <path class="cls-82" d="M286.58,412.92s-2.45,14.66,1,26.46c0,0-2.21,2.51-3.66-.64,0,0,.29-16.89-1.33-25.88Z"/>
                        <path class="cls-64" d="M282.82,414.39s1.88-2.56,3.6-.2l.16-1.27-4-.06Z"/>
                        <path class="cls-64" d="M280.82,385.86a4.24,4.24,0,0,1,5.25,1.58l.17.22a13.54,13.54,0,0,1,1.14-4.89s-4.6-2.19-6.79.64C280.59,383.41,280.68,384.3,280.82,385.86Z"/>
                        <path class="cls-64" d="M265.24,413.66l-2.48,2.42a17.62,17.62,0,0,1-.47-5l2.57-1.54S264.26,412.41,265.24,413.66Z"/>
                        <path class="cls-83" d="M288.69,396.61l-2.42-5.1S284.21,395.08,288.69,396.61Z"/>
                        <path class="cls-84" d="M258.31,434.37c-1,10.88,2.36,12,2.86,20.29s-1.13,10.5-1.53,18.17c0,0-3.73-4.29-3.81-18.39s1.26-20,1.26-20Z"/>
                        <path class="cls-73" d="M259.68,447.15a45.32,45.32,0,0,0,.28,22C262.25,460.91,261.8,453,259.68,447.15Z"/>
                        <g class="cls-48">
                        <path class="cls-49" d="M258.92,428.31l6.18-.74-1.63-9.43-3.89,1.18A58.4,58.4,0,0,1,258.92,428.31Z"/>
                        <polygon class="cls-49" points="259.14 414.73 261.97 411.56 261.36 409.39 258.24 408.66 259.14 414.73"/>
                        <polygon class="cls-49" points="258.29 431.26 265.52 430.43 265.7 431.73 257.5 432.99 258.29 431.26"/>
                        </g>
                        <path class="cls-85" d="M62.12,350.36c11.45.17,23.59-6.21,27.35-17.14,2.18-6.32,2-13,.87-19.58,7.16,8.65,20.92,11.69,31.76,8.77a30.19,30.19,0,0,0,21.42-23.61c4.33,5.43,11.13,10.23,18.06,9.77a22,22,0,0,0,17.09-10.45c5.93,2.37,12.66.46,17.45-3.76s6.61-8.74,9.81-16.22c3.42,12.49,12.24,23.62,24.53,27.72s27.59-.67,33.54-12.17a26,26,0,0,0,20.41,13.69,25.78,25.78,0,0,0,22.45-9.7c11.89,7.31,27.61,7.34,39-.7a36.83,36.83,0,0,0,14.49-36.8c-9.36-44.55-61.75-71.82-105.53-84.28-33.62-9.56-69.44-8.25-104-3-25.62,3.9-51.81,10.33-72.26,26.26a91.38,91.38,0,0,0-29.05,39.32c-7.7,20.22-7.92,42.41-8.06,64a156.89,156.89,0,0,0,2,26.06C45,338,48.54,350.17,62.12,350.36Z"/>
                        <path class="cls-86" d="M382.84,261.1c-8.5,13.59-31.33,15.53-41.75.5-18.47,21.59-50,25.92-73.12,13.34s-35.26-44.86-28.88-70.36A57.82,57.82,0,0,1,148.17,215c3.27,16.52-5,34.68-19.67,43s-34.49,6.24-47-5c0,0-13,7.79-20.27,16.53-5.9,7.07-11,15.45-12.19,24.6-.91,7.1-.5,16.57,2.91,23.49A15.48,15.48,0,0,0,45,329.89c-.1,7,5.49,16.81,17.12,20.47-12.36,1.31-26.2-6-31.24-18.47-4.58-11.33-2.8-26.17,6.57-34C12.81,286.05-2.62,257.43,1.05,230.33s27.71-45.49,54.84-49.25c-11.27-9.29-15.7-27.6-14.38-41.34a58.3,58.3,0,0,1,19.31-37.89,56.23,56.23,0,0,1,30.23-13.3c11.62-1.15,21.36-.28,31.05,4.62A22.7,22.7,0,0,1,127,74c4.55-5.11,11.81-7,18.58-6,6.12.92,12.3,5.1,15.77,12.69,2.87,6.28,4,11.79,5.37,19.32a87,87,0,0,1,66.81-44.44c27.72-2.74,57.5,7.16,74.21,30.53,16.19,22.66,19.51,61.31,7.81,83.24,9.72-5.17,20.29-7.36,29.57-5.71,16.49,2.93,26.6,15.3,24.84,34.13-.74,7.92-5.35,16.26-12.54,22.55,8.68.42,17.87,3.54,23.95,10.46C386.87,237,389,251.21,382.84,261.1Z"/>
                        <path class="cls-87" d="M281.62,110.82c2.94-12.4-4.43-26.15-16-31.44s-26.18-2.29-35.45,6.45a38.32,38.32,0,0,0-11.06,34.49A41.55,41.55,0,0,0,183.82,107c-4.6.54-9.23,2-12.78,4.91s-5.85,7.71-5,12.26c-8.29-1.68-17.39,4-19.47,12.24s3.18,17.57,11.27,20.05c-5.31,6.49-8.33,15.6-6.52,23.78a28.26,28.26,0,0,0,15.06,19c5.86,2.83,12.57,3.53,19.05,3,20.95-1.58,40.38-16.08,47.86-35.71,11.55,8.73,24,15.47,38.38,13.42s27.79-12.32,31.34-26.36a40.4,40.4,0,0,0-2.47-27.39C296.83,118.72,289.9,112.12,281.62,110.82Z"/>
                        <path class="cls-87" d="M103.64,191.9a10.71,10.71,0,0,1-.82-10.29c1.48-3,4.55-5.06,7.78-6.06a16.46,16.46,0,0,1,14.21,1.94,13,13,0,0,1,5.33,13c-1.08,4.84-5.84,8.73-10.78,8.33a13.85,13.85,0,1,1-8.12,24c-.08,3-2.53,5.47-5.15,7a21.23,21.23,0,1,1-2.45-37.91Z"/>
                        <path class="cls-87" d="M67.15,239.19c3.32-3.54,3.78-6.49,2.31-9s-4.34-4.06-10.62-2.37A21.29,21.29,0,0,0,47.4,236a12.1,12.1,0,0,0-2.6,7,6.48,6.48,0,0,0,3.85,6c3.17,1.16,6.66-.83,9.55-2.57A42.71,42.71,0,0,0,67.15,239.19Z"/>
                        <path class="cls-87" d="M46.28,223.11c2.91,1.2,5.56,2.41,9.08,2.51,2.18.07,5.13-.16,5.31-2.33.1-1.24-.87-2.29-1.85-3.06a20.8,20.8,0,0,0-10.94-4.45c-2.24-.22-5.11.4-5.56,2.6S44.21,222.26,46.28,223.11Z"/>
                        <path class="cls-88" d="M166.73,100c-2.4-4.94-5.56-9.12-10.3-11.91s-10.88-3.55-15.75-1-7.76,8.8-5.75,13.91c-16.89-6.39-37.74.15-48,15a21.66,21.66,0,0,1,13.15-17.6A57.74,57.74,0,0,0,54.52,127c-9.22,16.24-7.14,37.42,1.37,54.06-11.27-9.29-15.7-27.6-14.38-41.34a58.3,58.3,0,0,1,19.31-37.89,56.23,56.23,0,0,1,30.23-13.3c11.62-1.15,21.36-.28,31.05,4.62A22.7,22.7,0,0,1,127,74c4.55-5.11,11.81-7,18.58-6,6.12.92,12.3,5.1,15.77,12.69C164.23,86.93,165.37,92.44,166.73,100Z"/>
                        <path class="cls-89" d="M282.73,280.46c-3.73,21.76-5.35,39.48-7.11,59.58-.65,7.28-.84,12.35-1.53,16.35,0,0,0,.05,0,.06a17.93,17.93,0,0,1-4.5,9.79c-3.78,4.17-11.22,9.74-18.54,15.87-2.66,2.24-5.31,4.56-7.76,6.89l-.42-2.17,0-.25-.6-3.07-2.94-15.2-.79-4.28c7.84-4.67,13-7.58,16.35-11.12,0,0,0,0,0,0a17.22,17.22,0,0,0,4.52-9q1.39-7.17,2.65-14.57c3.08-17.75,5.6-36.18,7.55-53.66C275.18,278.26,277.73,279.31,282.73,280.46Z"/>
                        <path class="cls-90" d="M218.57,262.06c-11.18,32.06-11.9,35.2-11.42,69l-15.75-9-10-5.73L179.05,315c-8.94-25.54-26-50.89-38.77-67.42,3.82-5.33,5.57-9.54,7.53-16.13,10,15.07,19.05,28.3,28.62,43.64a46.12,46.12,0,0,0,6.38,7.48c2.86,2.43,5.15,2.55,10.26,1.92,8.22-22.93,14.56-36.28,21-57.51,3.82-2.09,11.09-4.88,21.61-17.47C235.28,210.81,222,252.34,218.57,262.06Z"/>
                        <path class="cls-91" d="M465.63,438.43a8.26,8.26,0,0,0,2.18-.43c.37-.16,1.73-.68,1.19-1a5.19,5.19,0,0,0-.8.06l-.3,0a4.71,4.71,0,0,1-1.12,0l-.43,0a1.11,1.11,0,0,1-.05.24c0,.09-.1.21-.17.2s-.06,0-.07-.09,0-.25-.05-.42v-.06l-1.27.45c0-.25.76-.83,1.16-1.29-.19-1.15-.61-2.61-1.78-3.13,0,0-.06,0-.05-.07a0,0,0,0,1,.05,0,3.65,3.65,0,0,0,.39-.49c.14-.17.29-.31.43-.47a3.5,3.5,0,0,0,.57-1,5.92,5.92,0,0,0,.7-2.14,2.4,2.4,0,0,0-.1-1.1c0-.06-.16-.13-.21-.21a.78.78,0,0,0-.31.42,37.61,37.61,0,0,1-2.44,4.38,1,1,0,0,1,.1.21c.12.39-.06.69-.14,1.07a2.63,2.63,0,0,0,.14,1,2.15,2.15,0,0,1-.05,1.1,2,2,0,0,1-.28.47,1.09,1.09,0,0,1-.27.22.91.91,0,0,1-.17.17.12.12,0,0,1-.15,0,.16.16,0,0,1-.05-.15,5.9,5.9,0,0,0,.18-1.4,5,5,0,0,1,.21-1.5,1.22,1.22,0,0,1,.07-.17s0,0,0,0a3.5,3.5,0,0,0-1.11-3,1.06,1.06,0,0,0-1.26,0,1.65,1.65,0,0,1,.75.48,3.24,3.24,0,0,1,.5,1.68,2.52,2.52,0,0,1-.66,1.59c-.28.33-.72.64-1,1,0,.07-2,2.36-2,2.43a2.41,2.41,0,0,0-.14.73l0,0h0c1,.56,3.38-.4,4.39.13A5.29,5.29,0,0,0,465.63,438.43Z"/>
                        <path class="cls-91" d="M467.91,431.86a4.37,4.37,0,0,0,1-.83c.17-.19.5-.8.76-.85h.06l0-.06c-.11-.09-.45-.14-1.51.53,0,0-2.57,1.63-2.87,1.78h0c-.12.15-.27.34-.42.51A6.32,6.32,0,0,0,467.91,431.86Z"/>
                        <path class="cls-91" d="M466.34,435.63a.89.89,0,0,0,.46.1,3.26,3.26,0,0,0,1.08-.18,13.5,13.5,0,0,0,1.81-.84c.26-.16,1.46-1,1.05-1.34a6.25,6.25,0,0,0-1.69.74l-.11.06a7.39,7.39,0,0,1-3,.83c.06.17.11.35.16.53Z"/>
                        <path class="cls-92" d="M469.38,437.05A.86.86,0,0,0,469,437c.54.34-.82.86-1.19,1a8.26,8.26,0,0,1-2.18.43,5.29,5.29,0,0,1-3.49-.32c-1-.53-3.41.43-4.39-.13.55,2.33,2.43,1.83,2.59,2.06.61.16,2.84-.74,3.2-.83.63-.16,2.89-.38,3.14-.39.74,0,2.88-.58,3.11-1.2C469.86,437.42,469.73,437.23,469.38,437.05Z"/>
                        <path class="cls-92" d="M469.69,434.71a13.5,13.5,0,0,1-1.81.84,3.26,3.26,0,0,1-1.08.18.89.89,0,0,1-.46-.1l-.23-.1a4.51,4.51,0,0,1,.16,1.2l.38-.1a14.3,14.3,0,0,0,1.68-.52c.71-.35,2.39-1.16,2.75-2.13.1-.29.09-.47,0-.56a.42.42,0,0,0-.33-.05C471.15,433.67,470,434.55,469.69,434.71Z"/>
                        <path class="cls-92" d="M464.73,437.3l1.27-.45c0-.24-.06-.53-.11-.84C465.49,436.47,464.74,437.05,464.73,437.3Z"/>
                        <path class="cls-92" d="M465.76,434.18a6.25,6.25,0,0,0,2.25-1.39l.22-.19a5.48,5.48,0,0,0,1.5-2,.68.68,0,0,0,0-.48h-.06c-.26.05-.59.66-.76.85a4.37,4.37,0,0,1-1,.83,6.32,6.32,0,0,1-3,1.07l0,.06a6.39,6.39,0,0,1,.82,1.1Z"/>
                        <path class="cls-92" d="M463.19,435.52a2.15,2.15,0,0,0,.05-1.1,2.63,2.63,0,0,1-.14-1c.08-.38.26-.68.14-1.07a1,1,0,0,0-.1-.21v0l0,.1a7.69,7.69,0,0,0-.26,2c0,.1,0,.2,0,.3a2.68,2.68,0,0,1,0,1.23,1.13,1.13,0,0,1-.21.35,1.09,1.09,0,0,0,.27-.22A2,2,0,0,0,463.19,435.52Z"/>
                        <path class="cls-92" d="M466.2,428.69a5.92,5.92,0,0,1-.7,2.14,3.5,3.5,0,0,1-.57,1c-.14.16-.29.3-.43.47a3.65,3.65,0,0,1-.39.49,1.87,1.87,0,0,1,.5,0,8.43,8.43,0,0,0,1.81-3.12h0a8.25,8.25,0,0,0,.33-1.13c.11-.63-.18-1.1-.52-1.18a.41.41,0,0,0-.34.06c.05.08.17.15.21.21A2.4,2.4,0,0,1,466.2,428.69Z"/>
                        <path class="cls-93" d="M461.62,432.22a3.24,3.24,0,0,0-.5-1.68,1.65,1.65,0,0,0-.75-.48,1.38,1.38,0,0,0-.23.16,2.92,2.92,0,0,1,.84,3.16c0,.06,0,.07,0,.08a4.38,4.38,0,0,0-1,1.34c.33-.35.77-.66,1-1A2.52,2.52,0,0,0,461.62,432.22Z"/>
                        <path class="cls-94" d="M460.45,440.31s0-.06-.09-.22l0,0h0C460.35,440.13,460.43,440.22,460.45,440.31Z"/>
                        <path class="cls-95" d="M470.06,437.78c0,.06-.06.13-.1.2-.41.69-1.52.89-2.26,1l-.21,0c-.43.08-.88.12-1.31.16l-.31,0-.43.07c-1,.18-4.32,1.21-5,1-.92-.09-3.28-2.63-2.88-3.16.15-.19,2.11-2.66,2.18-2.82l0-.08c.18-.4.47-.9.82-1h0a4,4,0,0,0,0-1.71,3.11,3.11,0,0,0-.31-.51c-.31-.45-.53-.78-.47-.92a.05.05,0,0,1,0,0,1.4,1.4,0,0,1,1.45-.37,3.45,3.45,0,0,1,1.67,2.07c.2-.35.44-.69.67-1a10.81,10.81,0,0,0,.9-1.44c.1-.21.18-.43.26-.65l0-.1a5,5,0,0,1,.41-.91,1.31,1.31,0,0,1,.8-.68.75.75,0,0,1,.64.27c.47.49.19,1.61,0,2.29l0,.16a4.69,4.69,0,0,1-.17.58,7.92,7.92,0,0,1-.82,1.57l1.36-.83,1.74-1.06c.27-.15.86-.4,1.19-.22a.47.47,0,0,1,.21.43,1.66,1.66,0,0,1-.1.56,5.41,5.41,0,0,1-1.21,1.65l-.2.21a6,6,0,0,1-2.91,1.89,2.17,2.17,0,0,1,.07.24.11.11,0,0,1,0,0l.68-.14a5.84,5.84,0,0,0,1.85-.56l.27-.16a10.57,10.57,0,0,1,1.46-.75,1.13,1.13,0,0,1,1.13.12.63.63,0,0,1,.08.7A4.73,4.73,0,0,1,469.1,436a14.33,14.33,0,0,1-1.55.58l-.53.18c.31,0,.81,0,1.27-.08l.74-.07a1.11,1.11,0,0,1,1,.42A.77.77,0,0,1,470.06,437.78ZM466,435c.06.17.11.35.16.53a4.51,4.51,0,0,1,.16,1.2l.38-.1a14.3,14.3,0,0,0,1.68-.52c.71-.35,2.39-1.16,2.75-2.13.1-.29.09-.47,0-.56a.42.42,0,0,0-.33-.05,6.25,6.25,0,0,0-1.69.74l-.11.06A7.39,7.39,0,0,1,466,435Zm-1.07-2a6.39,6.39,0,0,1,.82,1.1l.06.09a6.25,6.25,0,0,0,2.25-1.39l.22-.19a5.48,5.48,0,0,0,1.5-2,.68.68,0,0,0,0-.48l0-.06c-.11-.09-.45-.14-1.51.53,0,0-2.57,1.63-2.87,1.78h0c-.12.15-.27.34-.42.51Zm4.91,4.63c.07-.2-.06-.39-.41-.57A.86.86,0,0,0,469,437a5.19,5.19,0,0,0-.8.06l-.3,0a4.71,4.71,0,0,1-1.12,0l-.43,0a1.11,1.11,0,0,1-.05.24c0,.09-.1.21-.17.2s-.06,0-.07-.09,0-.25-.05-.42v-.06c0-.24-.06-.53-.11-.84-.19-1.15-.61-2.61-1.78-3.13,0,0-.06,0-.05-.07a0,0,0,0,1,.05,0,1.87,1.87,0,0,1,.5,0,8.43,8.43,0,0,0,1.81-3.12h0a8.25,8.25,0,0,0,.33-1.13c.11-.63-.18-1.1-.52-1.18a.41.41,0,0,0-.34.06.78.78,0,0,0-.31.42,37.61,37.61,0,0,1-2.44,4.38v0l0,.1a7.69,7.69,0,0,0-.26,2c0,.1,0,.2,0,.3a2.68,2.68,0,0,1,0,1.23,1.13,1.13,0,0,1-.21.35.91.91,0,0,1-.17.17.12.12,0,0,1-.15,0,.16.16,0,0,1-.05-.15,5.9,5.9,0,0,0,.18-1.4,5,5,0,0,1,.21-1.5,1.22,1.22,0,0,1,.07-.17s0,0,0,0a3.5,3.5,0,0,0-1.11-3,1.06,1.06,0,0,0-1.26,0,1.38,1.38,0,0,0-.23.16,2.92,2.92,0,0,1,.84,3.16c0,.06,0,.07,0,.08a4.38,4.38,0,0,0-1,1.34c0,.07-2,2.36-2,2.43a2.41,2.41,0,0,0-.14.73h0c.55,2.33,2.43,1.83,2.59,2.06h0c0,.09.11.18.13.27s0-.06-.09-.22l0,0c.61.16,2.84-.74,3.2-.83.63-.16,2.89-.38,3.14-.39C467.42,438.8,469.56,438.24,469.79,437.62Z"/>
                        <path class="cls-96" d="M422.76,459.38c-4.24-.06-11.21-2-19.39-11.54-13.53-15.74-10.45-21-14.45-25.86s-9.08-1-8.75,3.33,4.7,5.63,6.28,8.28-2.18,7.22-7.5.83c-5.09-6.14-7.17-13.49,1.05-18.19s11.82,2.65,13.88,8c3,7.78,7.22,16.74,17.27,25.15,4.51,3.78,8.09,5.11,10.67,5.43,3.18.4,3.71,4.56.94,4.52"/>
                        <path class="cls-91" d="M434.49,482.26a1.57,1.57,0,0,1-1.13-.49,3.86,3.86,0,0,1-.55-.83,3.75,3.75,0,0,0-.84-1.11,4.62,4.62,0,0,0-1.2-.64,5.91,5.91,0,0,1-1.18-.59,2,2,0,0,1-.39-2.59,2.07,2.07,0,0,0,.28-1.56h0a9,9,0,0,1,.35-1.19l.06-.17,0,.18c.15.78.37,1.27.61,1.34h0c.19,0,.43-.25.69-.74l.09,0c0,.45,0,1,.33,1.09h.07c.32,0,.74-.53,1.17-1.49l.07-.16,0,.17c.05.34.17.93.5,1h.05a.25.25,0,0,0,.16-.06,1.63,1.63,0,0,0,.29-1h.09c.16.36.38.86.58,1.22a6.11,6.11,0,0,0,1.58,1.73,15.4,15.4,0,0,0,2.72,1.46l.87.41c.73.36,1.12.69,1.21,1a.82.82,0,0,1-.15.68.75.75,0,0,1-.65.36,1.25,1.25,0,0,1-.57-.16l0,0v-.06s0-.08,0-.12a1.43,1.43,0,0,0-.1-.56.94.94,0,0,0-.33-.44l-.14-.08.13.09a.89.89,0,0,1,.27.46,1.29,1.29,0,0,1,0,.53,1.83,1.83,0,0,1,0,.21c-.09.55-.75.63-1.14.63h-.13v-.08a.08.08,0,0,0,0,0,1.69,1.69,0,0,0-.08-.66,1.26,1.26,0,0,0-.3-.57.58.58,0,0,0-.15-.11l.14.12a1.2,1.2,0,0,1,.24.58,1.47,1.47,0,0,1,0,.62,1,1,0,0,1-.71.81,1.5,1.5,0,0,1-.67.14,1.21,1.21,0,0,1-.6-.14l0,0,0-.07a.43.43,0,0,0,0-.05,1.34,1.34,0,0,0,0-.69,1.18,1.18,0,0,0-.3-.6.86.86,0,0,0-.14-.13l.13.14a1.29,1.29,0,0,1,.16,1.25,1.13,1.13,0,0,1-.4.55,2.12,2.12,0,0,1-1.19.4"/>
                        <path class="cls-91" d="M429.84,473.74l.05-.67s0-2.49,2.1-2.49,1.59,1.69,2.13,2.85-2.48,3.35-2.48,3.35l-1.33-1.46Z"/>
                        <path class="cls-92" d="M434.42,479.75a2.81,2.81,0,0,1,.52,0,1,1,0,0,0-.52,0"/>
                        <path class="cls-92" d="M437.48,479.24a1.08,1.08,0,0,1,.15,1.66c-.65.81-1.43,0-1.43,0a1.14,1.14,0,0,0-1.26-1.17,1.06,1.06,0,0,1,.74.49,1.09,1.09,0,0,1-.18,1.32,1.11,1.11,0,0,1-1.34.1,2.72,2.72,0,0,1-.75-1.23,5.16,5.16,0,0,0-2.14-2.36,9.17,9.17,0,0,1-.88-.66,1.39,1.39,0,0,1-.67-.84,2.73,2.73,0,0,1,0-.9l.35.17.32.13.33.11a4.31,4.31,0,0,0,1.38.16,3.85,3.85,0,0,0,1.33-.31,5.65,5.65,0,0,0,.6-.31,1.42,1.42,0,0,0,.28-.2l.28-.2-.29.19a2.75,2.75,0,0,1-.29.17,3.33,3.33,0,0,1-.61.27,3.69,3.69,0,0,1-1.31.23,4,4,0,0,1-1.29-.23,4.15,4.15,0,0,1-1-.52,2.47,2.47,0,0,0,0-.39,4.22,4.22,0,0,0-.27-.9l-.14.29a2.93,2.93,0,0,1-.13,1.4,10,10,0,0,0-.44,1.58,2.37,2.37,0,0,0,1.78,1.92,3.5,3.5,0,0,1,2.12,1.69c.51,1.1,1.08,1.65,2.24,1.37a1.47,1.47,0,0,0,1-.8h0a1.39,1.39,0,0,0,2.2-.94,1.1,1.1,0,0,0-.76-1.28"/>
                        <path class="cls-95" d="M429.05,475.93a2.22,2.22,0,0,0,.44,2.82,6.17,6.17,0,0,0,1.21.6,4.46,4.46,0,0,1,1.16.62,3.1,3.1,0,0,1,.79,1.06,4.33,4.33,0,0,0,.58.86,1.68,1.68,0,0,0,1.26.54,2.18,2.18,0,0,0,1.29-.42.59.59,0,0,1,1-.21,1.87,1.87,0,0,0,.74-.16,1.35,1.35,0,0,0,.74-.66h.15c.37,0,1.07-.07,1.27-.64a1,1,0,0,0,1.39-.29,1,1,0,0,0,.17-.82c-.1-.4-.52-.76-1.3-1.15l-.88-.41a16.55,16.55,0,0,1-2.68-1.44,5.89,5.89,0,0,1-1.54-1.67c-.33-.61-.76-1.67-.76-1.68l-.23-.56-3.84.1-.28.54v0c-.48,1.36-.44,1.45-.42,1.5a2,2,0,0,1-.26,1.41m.57,2.63a2,2,0,0,1-.38-2.53,2.12,2.12,0,0,0,.28-1.59,10.3,10.3,0,0,1,.36-1.18l.21-.58,3.7-.05.29.82c.16.36.38.87.57,1.23a6.21,6.21,0,0,0,1.6,1.73,15.2,15.2,0,0,0,2.73,1.47l.87.41c.72.36,1.1.68,1.19,1a.8.8,0,0,1-.15.64.85.85,0,0,1-1.16.19,1,1,0,0,0,0-.16,1.69,1.69,0,0,0-.1-.58,1,1,0,0,0-.36-.46.89.89,0,0,0-.54-.15,1.64,1.64,0,0,0-.54.13,1.61,1.61,0,0,1,.53-.07.84.84,0,0,1,.49.18.86.86,0,0,1,.26.43,1.73,1.73,0,0,1,0,.51,1.52,1.52,0,0,1,0,.21c-.09.57-.86.6-1.16.59,0,0,0,0,0-.06a1.9,1.9,0,0,0-.08-.68,1.27,1.27,0,0,0-.32-.59.8.8,0,0,0-.62-.23,1.7,1.7,0,0,0-.63.14,1.71,1.71,0,0,1,.63-.08.73.73,0,0,1,.54.25,1.18,1.18,0,0,1,.23.55,1.54,1.54,0,0,1,0,.6h0a1,1,0,0,1-.69.77,1.37,1.37,0,0,1-1.22,0l0-.08a1.46,1.46,0,0,0,0-.72A1.38,1.38,0,0,0,436,480a1.22,1.22,0,0,0-.61-.33,1.89,1.89,0,0,0-.67,0,2.09,2.09,0,0,1,.66.06,1.1,1.1,0,0,1,.53.36,1.23,1.23,0,0,1,.16,1.2,1,1,0,0,1-.39.53,1.68,1.68,0,0,1-2.25-.08,3.8,3.8,0,0,1-.55-.82,3.58,3.58,0,0,0-.85-1.13,4.31,4.31,0,0,0-1.22-.64,6,6,0,0,1-1.16-.59"/>
                        <path class="cls-95" d="M430.4,477.51c-.07,0-.11,0-.15,0a.7.7,0,0,1-.12-.2l-.12-.24c-.08-.17-.16-.33-.25-.5a2.1,2.1,0,0,0,.08.56c0,.09.06.18.1.27a.67.67,0,0,0,.16.28.33.33,0,0,0,.19.08.4.4,0,0,0,.19,0,1.24,1.24,0,0,0,.25-.18,1.22,1.22,0,0,0,.3-.5,2.77,2.77,0,0,1-.42.36.75.75,0,0,1-.21.12"/>
                        <path class="cls-91" d="M422.11,483.45A1.53,1.53,0,0,1,421,483a3.86,3.86,0,0,1-.55-.83,3.37,3.37,0,0,0-.84-1.12,4.94,4.94,0,0,0-1.2-.64,5.59,5.59,0,0,1-1.18-.58,2.05,2.05,0,0,1-.39-2.59,2.07,2.07,0,0,0,.28-1.56h0a7.45,7.45,0,0,1,.36-1.19l.05-.17,0,.17c.15.79.37,1.28.61,1.35h0c.19,0,.43-.25.7-.74l.09,0c-.05.45,0,1,.32,1.09h.07c.33,0,.74-.53,1.17-1.5l.07-.16,0,.17c.05.35.17.94.51,1h0a.23.23,0,0,0,.16-.06,1.59,1.59,0,0,0,.29-1l.09,0c.16.36.38.87.58,1.23a6.08,6.08,0,0,0,1.58,1.72,14.77,14.77,0,0,0,2.72,1.46l.87.42c.74.36,1.12.69,1.22,1a.85.85,0,0,1-.16.68.75.75,0,0,1-.65.36,1.25,1.25,0,0,1-.57-.16h0v-.06a.57.57,0,0,0,0-.13,1.38,1.38,0,0,0-.1-.55,1,1,0,0,0-.33-.45l-.14-.07a.38.38,0,0,1,.13.09.87.87,0,0,1,.28.45,1.81,1.81,0,0,1,0,.53,1.52,1.52,0,0,1,0,.21c-.08.56-.75.64-1.14.64h-.13l0-.08v0a1.63,1.63,0,0,0-.08-.65,1.22,1.22,0,0,0-.3-.57.61.61,0,0,0-.15-.12.58.58,0,0,1,.14.13,1.16,1.16,0,0,1,.24.58,1.67,1.67,0,0,1,0,.62,1.06,1.06,0,0,1-.72.8,1.66,1.66,0,0,1-.67.15,1.25,1.25,0,0,1-.59-.14l0,0,0-.07s0,0,0,0a1.6,1.6,0,0,0,0-.69,1.27,1.27,0,0,0-.31-.61.86.86,0,0,0-.14-.13l.13.14a1.29,1.29,0,0,1,.16,1.25,1.06,1.06,0,0,1-.4.56,2.06,2.06,0,0,1-1.19.39"/>
                        <path class="cls-91" d="M417.47,474.93l0-.66s0-2.49,2.1-2.5,1.59,1.69,2.13,2.85-2.47,3.35-2.47,3.35l-1.33-1.45Z"/>
                        <path class="cls-92" d="M422,481a2.34,2.34,0,0,1,.52,0,1,1,0,0,0-.52,0"/>
                        <path class="cls-92" d="M425.1,480.43a1.09,1.09,0,0,1,.15,1.66c-.65.82-1.43,0-1.43,0a1.15,1.15,0,0,0-1.26-1.18,1.09,1.09,0,0,1,.74.49,1.06,1.06,0,0,1-1.52,1.42,2.83,2.83,0,0,1-.75-1.22,5.11,5.11,0,0,0-2.14-2.36c-.33-.19-.56-.44-.88-.66a1.39,1.39,0,0,1-.67-.84,2.78,2.78,0,0,1,.05-.91,3.84,3.84,0,0,0,.35.18l.32.13.34.11a4.21,4.21,0,0,0,1.37.15,3.8,3.8,0,0,0,1.33-.31,4.37,4.37,0,0,0,.61-.31,2.61,2.61,0,0,0,.27-.19l.28-.21-.29.19a1.38,1.38,0,0,1-.29.17,4.22,4.22,0,0,1-.61.28,3.68,3.68,0,0,1-1.31.22,4,4,0,0,1-1.29-.22,4.53,4.53,0,0,1-1-.52,2.54,2.54,0,0,0,0-.39,3.47,3.47,0,0,0-.27-.9l-.14.29a3,3,0,0,1-.12,1.4,8.67,8.67,0,0,0-.44,1.57,2.34,2.34,0,0,0,1.77,1.92,3.54,3.54,0,0,1,2.12,1.69c.52,1.11,1.08,1.65,2.24,1.37a1.52,1.52,0,0,0,1.05-.8h0a1.38,1.38,0,0,0,2.2-.94,1.1,1.1,0,0,0-.76-1.28"/>
                        <path class="cls-95" d="M416.67,477.13a2.22,2.22,0,0,0,.44,2.81,6.24,6.24,0,0,0,1.21.61,4.43,4.43,0,0,1,1.16.61,3.37,3.37,0,0,1,.8,1.06,4.34,4.34,0,0,0,.57.87,1.76,1.76,0,0,0,1.26.54,2.24,2.24,0,0,0,1.29-.43,1.17,1.17,0,0,0,.34-.36,1.5,1.5,0,0,0,.67.15,1.71,1.71,0,0,0,.74-.16,1.34,1.34,0,0,0,.74-.65H426c.37,0,1.07-.07,1.27-.63a1,1,0,0,0,1.39-.29,1,1,0,0,0,.18-.82c-.11-.4-.53-.77-1.31-1.15l-.88-.42a15.81,15.81,0,0,1-2.68-1.44,5.91,5.91,0,0,1-1.54-1.67,18.25,18.25,0,0,1-.76-1.68l-.23-.56-3.84.1-.28.54v0c-.48,1.36-.44,1.46-.41,1.5a2.09,2.09,0,0,1-.27,1.42m.57,2.63a2,2,0,0,1-.37-2.53,2.2,2.2,0,0,0,.28-1.6,8.79,8.79,0,0,1,.35-1.18l.21-.58,3.7-.05.29.82c.16.37.38.87.58,1.23a5.91,5.91,0,0,0,1.59,1.74,15.86,15.86,0,0,0,2.73,1.47c.32.14.62.28.87.41.72.35,1.1.67,1.19,1a.75.75,0,0,1-.15.63.83.83,0,0,1-1.15.19c0-.05,0-.1,0-.16h0a1.59,1.59,0,0,0-.1-.57,1.08,1.08,0,0,0-.35-.47.93.93,0,0,0-.55-.14,1.93,1.93,0,0,0-.54.12,2,2,0,0,1,.54-.07.81.81,0,0,1,.48.18.84.84,0,0,1,.26.43,1.47,1.47,0,0,1,0,.51c0,.07,0,.14,0,.21-.09.58-.86.61-1.17.6,0,0,0,0,0-.07a1.84,1.84,0,0,0-.08-.67,1.25,1.25,0,0,0-.32-.6.8.8,0,0,0-.62-.22,1.91,1.91,0,0,0-.63.13,2.27,2.27,0,0,1,.63-.08.71.71,0,0,1,.54.25,1.18,1.18,0,0,1,.24.56,1.52,1.52,0,0,1,0,.6,1,1,0,0,1-.69.77,1.44,1.44,0,0,1-1.22,0l0-.09a1.43,1.43,0,0,0,0-.71,1.25,1.25,0,0,0-.31-.63,1.21,1.21,0,0,0-.6-.34,1.73,1.73,0,0,0-.68,0,1.63,1.63,0,0,1,.66.06,1,1,0,0,1,.53.35,1.24,1.24,0,0,1,.16,1.2,1,1,0,0,1-.39.54,1.68,1.68,0,0,1-2.25-.09,3.57,3.57,0,0,1-.55-.82,3.4,3.4,0,0,0-.85-1.12,4.43,4.43,0,0,0-1.21-.65,6.36,6.36,0,0,1-1.17-.58"/>
                        <path class="cls-95" d="M418,478.71a.16.16,0,0,1-.15,0,.87.87,0,0,1-.12-.2l-.12-.25-.24-.5a1.52,1.52,0,0,0,.08.56,1.31,1.31,0,0,0,.09.28.71.71,0,0,0,.16.27.34.34,0,0,0,.19.09.38.38,0,0,0,.19,0,.8.8,0,0,0,.25-.18,1.14,1.14,0,0,0,.3-.49,4.59,4.59,0,0,1-.41.36,1.64,1.64,0,0,1-.22.12"/>
                        <path class="cls-97" d="M418.15,472.39a14.82,14.82,0,0,0-.35-5.13,2.06,2.06,0,0,1,.47-2.24,2.36,2.36,0,0,1,2.56-.42l1.28.54a4.29,4.29,0,0,1,2.31,5.49c-.27.68-.58,1.39-.88,2.1-.66,1.56-1.19,3.24-1.19,3.24l-.49-.5a2,2,0,0,1-.28,1.12,1.24,1.24,0,0,0,.15,1.24s-1.07-.33-1.14-.7-.17-.85-.17-.85l-.28,1.12-.54-1.53-.58.7a4.84,4.84,0,0,1-.84-1.9s-.24-.14,0-2.28"/>
                        <path class="cls-96" d="M417.6,471.82a14.82,14.82,0,0,0-.35-5.13,2.06,2.06,0,0,1,.47-2.24,2.36,2.36,0,0,1,2.56-.42l1.28.54a4.29,4.29,0,0,1,2.31,5.49c-.27.68-.58,1.39-.88,2.1-.66,1.56-1.19,3.24-1.19,3.24l-.49-.5A2,2,0,0,1,421,476a1.24,1.24,0,0,0,.15,1.24s-1.07-.33-1.14-.7-.17-.85-.17-.85l-.28,1.12-.54-1.53-.58.7a4.84,4.84,0,0,1-.84-1.9s-.24-.14,0-2.28"/>
                        <path class="cls-98" d="M417.6,471.82a14.82,14.82,0,0,0-.35-5.13,2.06,2.06,0,0,1,.47-2.24,2.36,2.36,0,0,1,2.56-.42l1.28.54a4.29,4.29,0,0,1,2.31,5.49c-.27.68-.58,1.39-.88,2.1-.66,1.56-1.19,3.24-1.19,3.24l-.49-.5A2,2,0,0,1,421,476a1.24,1.24,0,0,0,.15,1.24s-1.07-.33-1.14-.7-.17-.85-.17-.85l-.28,1.12-.54-1.53-.58.7a4.84,4.84,0,0,1-.84-1.9S417.39,474,417.6,471.82Z"/>
                        <path class="cls-97" d="M424.13,452.14a24.68,24.68,0,0,1,2.1,12c-.62,6.48-3.52,7.61-5.36,7.2s-1.91-.17-3-4.09-2.67-8.47-2.67-8.47a9.59,9.59,0,0,1,9-6.62"/>
                        <path class="cls-96" d="M423.53,451.6a24.71,24.71,0,0,1,2.1,12c-.61,6.48-3.51,7.62-5.36,7.2s-1.91-.17-3-4.09-2.68-8.47-2.68-8.47a9.61,9.61,0,0,1,9-6.62"/>
                        <path class="cls-98" d="M423.53,451.6a24.71,24.71,0,0,1,2.1,12c-.61,6.48-3.51,7.62-5.36,7.2s-1.91-.17-3-4.09-2.68-8.47-2.68-8.47A9.61,9.61,0,0,1,423.53,451.6Z"/>
                        <path class="cls-99" d="M426.21,457.75a20.51,20.51,0,0,1-.07,9.2s-3.39,2.26-9.9-.2a34.91,34.91,0,0,0-2-5.93c-1.15-2.37-1.26-3.49-2-5s14,1.91,14,1.91"/>
                        <path class="cls-99" d="M426.21,457.75a17.59,17.59,0,0,1,.46,3.49,8.84,8.84,0,0,1-3.57.61,22.51,22.51,0,0,1-6.24-1.42l2,2.57c.35,1.19.71,2.39,1.07,3.59.1.34.21.69.34,1,0,.06.05.12.07.17a17.47,17.47,0,0,1-4.1-1,34.91,34.91,0,0,0-2-5.93c-1.15-2.37-1.26-3.49-2-5s14,1.91,14,1.91"/>
                        <path class="cls-99" d="M414.61,455.56l1,.13a34.9,34.9,0,0,0,1.06,4.14c.18.56.38,1.14.57,1.7a22.85,22.85,0,0,1,1.48,6l-1-.27a24,24,0,0,0-1.4-5.4c-.2-.56-.4-1.15-.58-1.72a37.25,37.25,0,0,1-1.15-4.57"/>
                        <path class="cls-97" d="M458.42,437.48l.68-1.81s-1.62.43-3.08.88c-2.87.67-4.91,1-7.62,2.85-3.12,2.11.24,6.36,3,5.39,1.81-.63,3.36-1.15,6-1.89a9.67,9.67,0,0,0,2.91-1.64l-.49,0,1.55-1.12h-1s.32-.58.81-.63a5.66,5.66,0,0,1,2.11.09s-1.11-2.16-2.71-2.43Z"/>
                        <path class="cls-96" d="M455.38,436a13,13,0,0,1,3.11-.48l-.71,1.4,2.79-.17L459,438l1.46-.3c.64-.13,1.89,1.34,1.89,1.34a2.15,2.15,0,0,0-2.07.59,3.4,3.4,0,0,1-1.6,1.19l1-.06a9.48,9.48,0,0,1-2.91,1.63c-2.67.74-4.22,1.26-6,1.9-2.76,1-6.12-3.29-3-5.4,2.71-1.83,4.75-2.18,7.62-2.84"/>
                        <path class="cls-98" d="M455.38,436a13,13,0,0,1,3.11-.48l-.71,1.4,2.79-.17L459,438l1.46-.3c.64-.13,1.89,1.34,1.89,1.34a2.15,2.15,0,0,0-2.07.59,3.4,3.4,0,0,1-1.6,1.19l1-.06a9.48,9.48,0,0,1-2.91,1.63c-2.67.74-4.22,1.26-6,1.9-2.76,1-6.12-3.29-3-5.4C450.47,437,452.51,436.69,455.38,436Z"/>
                        <path class="cls-97" d="M430.53,471.19a14.51,14.51,0,0,0-.36-5.12,2.07,2.07,0,0,1,.48-2.25,2.37,2.37,0,0,1,2.56-.42l1.28.55a4.27,4.27,0,0,1,2.3,5.48c-.26.68-.57,1.39-.87,2.11-.66,1.56-1.27,3.45-1.27,3.45l-.41-.71a2,2,0,0,1-.28,1.12,1.25,1.25,0,0,0,.15,1.24s-1.07-.34-1.14-.71-.17-.85-.17-.85l-.28,1.13-.54-1.54-.58.7a4.76,4.76,0,0,1-.84-1.9s-.24-.13,0-2.28"/>
                        <path class="cls-96" d="M430,470.62a14.51,14.51,0,0,0-.36-5.12,2.07,2.07,0,0,1,.48-2.25,2.37,2.37,0,0,1,2.56-.42l1.28.55a4.28,4.28,0,0,1,2.31,5.48c-.27.68-.58,1.39-.88,2.11-.66,1.56-1.19,3.23-1.19,3.23l-.49-.49a2,2,0,0,1-.28,1.12,1.25,1.25,0,0,0,.15,1.24s-1.07-.34-1.14-.71-.17-.85-.17-.85l-.28,1.13-.54-1.54-.58.7a4.76,4.76,0,0,1-.84-1.89s-.24-.14,0-2.29"/>
                        <path class="cls-98" d="M430,470.62a14.51,14.51,0,0,0-.36-5.12,2.07,2.07,0,0,1,.48-2.25,2.37,2.37,0,0,1,2.56-.42l1.28.55a4.28,4.28,0,0,1,2.31,5.48c-.27.68-.58,1.39-.88,2.11-.66,1.56-1.19,3.23-1.19,3.23l-.49-.49a2,2,0,0,1-.28,1.12,1.25,1.25,0,0,0,.15,1.24s-1.07-.34-1.14-.71-.17-.85-.17-.85l-.28,1.13-.54-1.54-.58.7a4.76,4.76,0,0,1-.84-1.89S429.77,472.77,430,470.62Z"/>
                        <path class="cls-100" d="M433.56,466.61c-3.61.32-4.64-.62-4.64-.62s4.83-.82,10.92-1.21c0,0-.31,1.31-6.28,1.83"/>
                        <path class="cls-97" d="M436.51,451a24.79,24.79,0,0,1,2.1,12c-.62,6.48-3.52,7.62-5.36,7.2s-1.92-.16-3-4.09-2.67-8.46-2.67-8.46a9.59,9.59,0,0,1,9-6.62"/>
                        <path class="cls-96" d="M435.91,450.41a24.68,24.68,0,0,1,2.1,12c-.61,6.48-3.52,7.61-5.36,7.2s-1.91-.17-3-4.09S427,457,427,457a9.59,9.59,0,0,1,9-6.62"/>
                        <path class="cls-98" d="M435.91,450.41a24.68,24.68,0,0,1,2.1,12c-.61,6.48-3.52,7.61-5.36,7.2s-1.91-.17-3-4.09S427,457,427,457A9.59,9.59,0,0,1,435.91,450.41Z"/>
                        <path class="cls-99" d="M426.66,456.86a68.55,68.55,0,0,0,2.26,9.13s4.83-.82,10.92-1.21a42.82,42.82,0,0,0-1.23-9.78s-8.11-.43-11.95,1.86"/>
                        <path class="cls-99" d="M428.92,466a68.55,68.55,0,0,1-2.26-9.13c3.84-2.29,11.95-1.86,11.95-1.86.11.42.22.85.31,1.28a11.93,11.93,0,0,1-7.22,4,3.1,3.1,0,0,0-1,.23.92.92,0,0,0-.57.8c0,.62.85,1.09.69,1.69l.6.6-.36.27,1.12,1.17a.6.6,0,0,0-.13.51c-1.94.25-3.13.46-3.13.46"/>
                        <path class="cls-99" d="M428.28,456.12c.33-.11.67-.22,1-.31-.12,2.16-.1,6.49,1.61,9.88l-1,.15a21.64,21.64,0,0,1-1.6-9.72"/>
                        <path class="cls-97" d="M446.24,443a34.58,34.58,0,0,0-9.12-8.9c-5.67-3.66-.88-7.69,2.84-5.73s9.49,8.3,11,10.79-1.16,8.24-4.76,3.84"/>
                        <path class="cls-97" d="M446.49,441.48a6.85,6.85,0,0,0,.45,1.95c.4,1,1.19,2.5,3.77,1.51s2.87-4.32,1-6.36-5.18,2.9-5.18,2.9"/>
                        <path class="cls-96" d="M446.89,442.65a34.46,34.46,0,0,0-9.12-8.89c-5.67-3.67-.88-7.69,2.84-5.74s9.48,8.3,11,10.8-1.16,8.23-4.76,3.83"/>
                        <path class="cls-98" d="M446.89,442.65a34.46,34.46,0,0,0-9.12-8.89c-5.67-3.67-.88-7.69,2.84-5.74s9.48,8.3,11,10.8S450.49,447.05,446.89,442.65Z"/>
                        <path class="cls-101" d="M442.36,426.87l7.24,6.88-7.39,6.77-6.27-5.32-1.05-1.3a2,2,0,0,1-.18-2.32l1.26-2.14,2.18-2.18,1.83-.8A2.18,2.18,0,0,1,442.36,426.87Z"/>
                        <path class="cls-102" d="M446.81,434.9a6.08,6.08,0,0,1,.09-2.55c.11-.41.2-.72.27-1l-3-2.87c-.44.46-1.4,1.45-2.09,2.08a6,6,0,0,1-2.21,1.27l-.1,1a8.42,8.42,0,0,0,3.75-1.08,14.45,14.45,0,0,0,2-1.53,7.22,7.22,0,0,0-.35,1.36,6.47,6.47,0,0,0,.8,3.82Z"/>
                        <path class="cls-103" d="M449.13,433.93a2.84,2.84,0,0,1-1.5,1c.51-.65.13-1.46-.31-2.05a2.64,2.64,0,0,0-1.16,1.8,8.18,8.18,0,0,0-.82-.67,2.39,2.39,0,0,0-1.51-.29,1.88,1.88,0,0,0,1.48,1.83c-.42.4-1.32,0-1.6-.43-.18.66.72,1.61,1.44,1.68a2.4,2.4,0,0,0,1.45-.56l.21.05,2.36-2.16C449.16,434.07,449.14,434,449.13,433.93Z"/>
                        <path class="cls-104" d="M447.05,434.15a1.9,1.9,0,0,0-.38,1,1.29,1.29,0,0,1-.18.43c.3-.07.53-.42.66-.69a1.59,1.59,0,0,0,.1-1.19A1,1,0,0,1,447.05,434.15Z"/>
                        <path class="cls-104" d="M441.81,431.53a2.69,2.69,0,0,1,.79.71.78.78,0,0,0,.42.36,1.47,1.47,0,0,1-1-.38,1.57,1.57,0,0,1-.62-1C441.51,431.36,441.68,431.43,441.81,431.53Z"/>
                        <path class="cls-104" d="M441.72,433.17a2.48,2.48,0,0,1,1,0,1.15,1.15,0,0,0,.44-.13,1.32,1.32,0,0,1-.83.56,1.27,1.27,0,0,1-1.21-.65C441.31,433.09,441.51,433.23,441.72,433.17Z"/>
                        <path class="cls-105" d="M438.93,429.27c.3,0,.78-.33,1.06-.45a5.13,5.13,0,0,0,1-.57c.16-.12.81-.79.32-.82-.33,0-.69.53-.91.73a3.24,3.24,0,0,1-1,.61c-.15.06-.57.13-.65.29s.31.23.42.09Z"/>
                        <path class="cls-105" d="M446.3,432.15c0,.21-.21.85-.11,1a.19.19,0,0,0,.18.07c.22,0,.2-.7.24-.87s.39-.95.2-1S446.32,432,446.3,432.15Z"/>
                        <path class="cls-103" d="M436.53,428.12c-.38-.44,0-1.32.51-1.58-.66-.21-1.65.64-1.75,1.36a2.33,2.33,0,0,0,.49,1.47,2.21,2.21,0,0,0,.4,2.23A2.09,2.09,0,0,0,438,432a2.85,2.85,0,0,1-.95-1.54c.63.54,1.45.19,2.06-.23a2.59,2.59,0,0,0-1.74-1.23,9.14,9.14,0,0,0,.7-.79,2.33,2.33,0,0,0,.36-1.49A1.86,1.86,0,0,0,436.53,428.12Z"/>
                        <path class="cls-104" d="M437.87,429.92a2,2,0,0,0-1-.43,1.23,1.23,0,0,1-.43-.2,1.18,1.18,0,0,0,.66.69,1.6,1.6,0,0,0,1.19.16A1,1,0,0,1,437.87,429.92Z"/>
                        <path class="cls-104" d="M437.63,427.64a2.7,2.7,0,0,1-.75.75.79.79,0,0,0-.38.41,1.37,1.37,0,0,1,.43-.95,1.55,1.55,0,0,1,1-.58C437.81,427.34,437.74,427.51,437.63,427.64Z"/>
                        <path class="cls-104" d="M436.71,431.06a1.88,1.88,0,0,0-.53-.91,1.3,1.3,0,0,1-.22-.42,1.19,1.19,0,0,0,.12.95,1.62,1.62,0,0,0,.86.83C436.8,431.4,436.78,431.22,436.71,431.06Z"/>
                        <path class="cls-104" d="M436,427.47a2.47,2.47,0,0,1,0,1,1.24,1.24,0,0,0,.11.44,1.27,1.27,0,0,1-.51-.85,1.26,1.26,0,0,1,.7-1.18A.73.73,0,0,0,436,427.47Z"/>
                        <path class="cls-106" d="M421.8,421a18.57,18.57,0,0,0,4.87.53,21.13,21.13,0,0,0,6.38-1.09l.85,1.48L430,431.31l-5.1-1.37Z"/>
                        <path class="cls-106" d="M431.82,463.5c1.71-.17,3.54-.41,4.79-1.58a4.87,4.87,0,0,0,1.21-4.65,8.23,8.23,0,0,0-2.72-4.15,8.91,8.91,0,0,0-2.49-1.58,8,8,0,0,0-2.86-.56,11,11,0,0,0-5.15,1.22,7.52,7.52,0,0,0-3,2.51,5.59,5.59,0,0,0-.66,4.39c.4,1.51,1.76,3.63,3.3,4.24C426.48,464.24,429.46,463.74,431.82,463.5Z"/>
                        <path class="cls-101" d="M444.48,444.87a36.94,36.94,0,0,0-4.14-18.75,3.46,3.46,0,0,0-1.69-1.87l-2.08-1.05c-.28-.14-3-1.26-3-1.52l-4.64,6-7.58-5.57c-.14-.1-1.36.47-1.57.55-.55.21-1.09.43-1.62.69a11.47,11.47,0,0,0-2.55,1.76,6.82,6.82,0,0,0-1.56,2.5c-.83,2-.95,4.14-1.54,6.19a46.67,46.67,0,0,0-1.22,6.84c-.54,4.08-.37,8.24-1.49,12.23-.39,1.41-1.22,2.88-1,4.37.26,1.9,2,3,3.58,3.81a33.32,33.32,0,0,0,7.38,2.39c2.7.3,5.89.29,5.89.29l2.64-6.81a10.14,10.14,0,0,0,2.34,3.37,26.29,26.29,0,0,0,3.78,3,20.37,20.37,0,0,0,6.06-.88,25,25,0,0,0,3.25-1.33S444.08,451.39,444.48,444.87Z"/>
                        <path class="cls-107" d="M428.26,456.93a12,12,0,0,0,2.35,3.53,21.15,21.15,0,0,0,3.84,2.87c-1.51-1.84-1.79-3.13-1.63-6.83A13.52,13.52,0,0,1,428.26,456.93Z"/>
                        <path class="cls-107" d="M428.83,427.63c0,.22-1.78,1.4-2,3.7,0,0-3.57-2.62-4.66-3.62s-3.53-3.84-3.53-3.84l3.2-2.91s2.09,2.65,2.9,3.43S428.83,427.63,428.83,427.63Z"/>
                        <path class="cls-108" d="M412.92,459.35c0,.23,1.82.64,4.17-.32,1.92-.79,3.49-2.16,3.27-2.7s-2.28-1.51-4.34-.62C413.47,456.83,412.86,458.48,412.92,459.35Z"/>
                        <path class="cls-109" d="M415.87,456.93c-.26-.3-.77-.09-1.68.67a1.84,1.84,0,0,0-.76,1.21c0,.51.59.49.85.2s.37-.76.72-1.05S416.22,457.32,415.87,456.93Z"/>
                        <path class="cls-102" d="M416.49,449.19a6.52,6.52,0,0,0,.18,2.77c.36,1.26,1.12,3.25,1.15,3.38s-.23.57-1.1.79a1.21,1.21,0,0,1-1.22-.18,12.78,12.78,0,0,1-.69-3.17,9,9,0,0,1,.75-4.16Z"/>
                        <path class="cls-103" d="M417.45,449.26c.61-.16,1.28.65,1.3,1.25.52-.53.16-1.91-.49-2.35a2.56,2.56,0,0,0-1.67-.23,2.39,2.39,0,0,0-2.37-.67,2.25,2.25,0,0,0-1.26,1.57,3,3,0,0,1,2-.19c-.82.35-.88,1.32-.77,2.12a2.83,2.83,0,0,0,2-1.12,8.54,8.54,0,0,0,.43,1.07,2.63,2.63,0,0,0,1.29,1.07A2,2,0,0,0,417.45,449.26Z"/>
                        <path class="cls-104" d="M415.06,449.7a2.14,2.14,0,0,0,.88-.74,1.47,1.47,0,0,1,.4-.32,1.31,1.31,0,0,0-1,.32,1.71,1.71,0,0,0-.72,1.08C414.72,449.87,414.91,449.81,415.06,449.7Z"/>
                        <path class="cls-104" d="M417.39,450.56a3.11,3.11,0,0,1-.37-1.08.87.87,0,0,0-.22-.57c.33.09.6.57.73.87a1.7,1.7,0,0,1,.06,1.29A1.11,1.11,0,0,0,417.39,450.56Z"/>
                        <path class="cls-104" d="M414.5,448a2,2,0,0,0,1.14-.08,1.52,1.52,0,0,1,.52,0,1.31,1.31,0,0,0-1-.34A1.75,1.75,0,0,0,414,448,1.14,1.14,0,0,1,414.5,448Z"/>
                        <path class="cls-104" d="M418.35,449.05a2.76,2.76,0,0,1-1-.49,1.36,1.36,0,0,0-.49-.11,1.41,1.41,0,0,1,1.08-.09,1.37,1.37,0,0,1,.82,1.25C418.69,449.34,418.58,449.11,418.35,449.05Z"/>
                        <path class="cls-102" d="M410.22,454.54a6.49,6.49,0,0,1,2.44,1.31,16.51,16.51,0,0,1,1.32,1.23c.12.1.66,0,1.07-.29.78-.46.63-.73.63-.73s.15-.34-1.5-1.56a7,7,0,0,0-4.1-1.05Z"/>
                        <path class="cls-103" d="M410.3,452.79c-.19-.6.59-1.31,1.19-1.36a1.37,1.37,0,0,0-1.24-.13c-.47,2.12-1,4-1.38,5.39a2.61,2.61,0,0,0,1.21.6,3,3,0,0,1-.28-1.94c.38.8,1.36.82,2.15.67a2.88,2.88,0,0,0-1.21-2,6.89,6.89,0,0,0,1-.48,2.52,2.52,0,0,0,1-1.33A2,2,0,0,0,410.3,452.79Z"/>
                        <path class="cls-104" d="M410.85,455.16a2.08,2.08,0,0,0-.78-.84,1.56,1.56,0,0,1-.33-.39,1.31,1.31,0,0,0,.36,1,1.71,1.71,0,0,0,1.11.67C411,455.49,411,455.31,410.85,455.16Z"/>
                        <path class="cls-104" d="M411.61,452.79a3.16,3.16,0,0,1-1.07.42.89.89,0,0,0-.56.24c.07-.33.54-.62.83-.76a1.71,1.71,0,0,1,1.29-.13A1.16,1.16,0,0,0,411.61,452.79Z"/>
                        <path class="cls-105" d="M415.19,451.05c-.18.28-.06.92-.08,1.25a6,6,0,0,0,.07,1.28c0,.21.38,1.16.64.7.18-.31-.19-.93-.27-1.23a3.67,3.67,0,0,1-.12-1.28c0-.17.15-.61,0-.76s-.37.18-.29.37Z"/>
                        <path class="cls-105" d="M413.16,455.39c-.2-.12-.72-.62-1-.6a.17.17,0,0,0-.15.14c-.1.22.58.53.73.65s.74.83.92.69S413.31,455.48,413.16,455.39Z"/>
                        <path class="cls-108" d="M438.77,462.17c-1.89-2-3.65-2.06-4.46-1.71-.17.07-.06,1.32.91,2.81a21.78,21.78,0,0,0,4-.52C439.09,462.56,438.94,462.36,438.77,462.17Z"/>
                        <path class="cls-109" d="M437.61,462.45c.19-.34-.18-.76-1.2-1.36a1.81,1.81,0,0,0-1.39-.32c-.48.16-.27.72.1.87s.84.09,1.23.33S437.35,462.91,437.61,462.45Z"/>
                        <path class="cls-102" d="M442.93,459.46a4.76,4.76,0,0,0-2.48.65,9.22,9.22,0,0,0-2,1.67,1.52,1.52,0,0,0,.16,1.13,6.72,6.72,0,0,0,1.37-.47c.54-.25,1.05-.51,1.49-.75l.08-.08a4.31,4.31,0,0,1,1.75-1Z"/>
                        <path class="cls-103" d="M442.58,461.66c.74-.34,1.18-.56,1.18-.56a5.31,5.31,0,0,1-.07-2.39,7.39,7.39,0,0,0-2,.64,2.85,2.85,0,0,0,1.72,1.56A8.31,8.31,0,0,0,442.58,461.66Z"/>
                        <path class="cls-104" d="M442.82,459.81a1.39,1.39,0,0,0-.67-.05,1.15,1.15,0,0,1,.45.3c.09.07.24.22.44.36C443,460.24,442.9,460,442.82,459.81Z"/>
                        <path class="cls-102" d="M438,456.32a6.56,6.56,0,0,1-.43,2.74,18,18,0,0,1-.72,1.66c0,.15.26.6.63.91.68.58.89.36.89.36s.37,0,1-1.94a7.08,7.08,0,0,0-.37-4.22Z"/>
                        <path class="cls-103" d="M439.66,455.83c.51-.38,1.43.12,1.68.67.28-.7-.57-1.83-1.34-2a2.37,2.37,0,0,0-1.63.42,2.41,2.41,0,0,0-2.45.25,2.27,2.27,0,0,0-.58,1.93,3,3,0,0,1,1.74-.9c-.63.63-.32,1.55.08,2.24a2.79,2.79,0,0,0,1.48-1.79,6.86,6.86,0,0,0,.8.82A2.55,2.55,0,0,0,441,458,2,2,0,0,0,439.66,455.83Z"/>
                        <path class="cls-104" d="M437.61,457.13a2.1,2.1,0,0,0,.54-1,1.45,1.45,0,0,1,.25-.44,1.34,1.34,0,0,0-.8.66,1.74,1.74,0,0,0-.26,1.27C437.36,457.41,437.51,457.28,437.61,457.13Z"/>
                        <path class="cls-104" d="M440.1,457.05a2.76,2.76,0,0,1-.75-.87,1,1,0,0,0-.42-.44c.34,0,.78.31,1,.53a1.72,1.72,0,0,1,.55,1.18C440.41,457.27,440.24,457.18,440.1,457.05Z"/>
                        <path class="cls-104" d="M436.46,455.79a2.18,2.18,0,0,0,1-.5,1.43,1.43,0,0,1,.47-.21,1.31,1.31,0,0,0-1,.06,1.75,1.75,0,0,0-1,.86A1.16,1.16,0,0,1,436.46,455.79Z"/>
                        <path class="cls-104" d="M440.42,455.29a2.56,2.56,0,0,1-1.08-.1,1.39,1.39,0,0,0-.48.09,1.37,1.37,0,0,1,1-.49,1.35,1.35,0,0,1,1.22.85C440.84,455.43,440.65,455.26,440.42,455.29Z"/>
                        <path class="cls-105" d="M441.34,460.65c-.32-.08-.88.25-1.2.35a5.39,5.39,0,0,0-1.19.48c-.18.1-1,.74-.45.84s.82-.49,1.08-.67a3.59,3.59,0,0,1,1.16-.53c.17,0,.63-.06.73-.23s-.3-.29-.44-.15Z"/>
                        <path class="cls-105" d="M438.16,459.38c0-.22.34-.88.25-1.09a.18.18,0,0,0-.18-.1c-.24,0-.31.73-.37.91s-.54,1-.35,1.09S438.12,459.55,438.16,459.38Z"/>
                        <path class="cls-108" d="M435.35,448.65c-.16.16.7,1.79,3,3,1.85.95,3.91,1.24,4.18.72s-.34-2.71-2.36-3.69C437.62,447.42,436,448,435.35,448.65Z"/>
                        <path class="cls-109" d="M439.11,449.31c.05-.39-.44-.64-1.61-.84a1.83,1.83,0,0,0-1.41.21c-.39.33,0,.77.41.78a7.48,7.48,0,0,1,1.26-.15C438.05,449.37,439,449.82,439.11,449.31Z"/>
                        <path class="cls-102" d="M444.62,445.29a6.45,6.45,0,0,0-1.22,1.39c-.72,1.09-1.74,3-1.82,3.07s-.58.2-1.31-.32-.66-1-.66-1a12.47,12.47,0,0,1,1.95-2.59,8.53,8.53,0,0,1,3-1.91Z"/>
                        <path class="cls-103" d="M444.52,443.09a2,2,0,0,0-1.85.89,3,3,0,0,0,1.93.84C444.57,444.28,444.54,443.7,444.52,443.09Z"/>
                        <path class="cls-103" d="M443.36,441.82a2.56,2.56,0,0,1,1.14.95c0-.4,0-.8-.06-1.22A2.73,2.73,0,0,0,443.36,441.82Z"/>
                        <path class="cls-103" d="M444.28,447.64a7.47,7.47,0,0,0,.34-2.43,2.47,2.47,0,0,0-.3.61c-.22.64-.59,1.09-.44,1.62C444,447.41,444.16,447.69,444.28,447.64Z"/>
                        <path class="cls-104" d="M444.55,443.67a1.55,1.55,0,0,0-1,.2,1.1,1.1,0,0,1,.53.11c.11,0,.28.11.51.16Z"/>
                        <path class="cls-102" d="M437.24,443.46a6.56,6.56,0,0,1,.59,2.71,14.28,14.28,0,0,1-.07,1.81c0,.15.46.46.92.62.85.28,1,0,1,0s.35-.11.21-2.16a7,7,0,0,0-1.88-3.79Z"/>
                        <path class="cls-103" d="M438.62,442.39c.33-.54,1.38-.41,1.8,0,0-.74-1.19-1.49-2-1.37a2.51,2.51,0,0,0-1.37,1s-1.64-.08-2.19,1.13a2.26,2.26,0,0,0,.17,2,3,3,0,0,1,1.29-1.48c-.36.82.26,1.56.89,2.07a2.82,2.82,0,0,0,.72-2.21A9.25,9.25,0,0,0,439,444a2.57,2.57,0,0,0,1.66-.11A2,2,0,0,0,438.62,442.39Z"/>
                        <path class="cls-104" d="M437.18,444.35a2.05,2.05,0,0,0,.13-1.14,1.42,1.42,0,0,1,.07-.51,1.34,1.34,0,0,0-.5.91,1.74,1.74,0,0,0,.21,1.28A1.26,1.26,0,0,1,437.18,444.35Z"/>
                        <path class="cls-104" d="M439.47,443.37a3,3,0,0,1-1-.53.9.9,0,0,0-.54-.27,1.53,1.53,0,0,1,1.12.14,1.69,1.69,0,0,1,.94.9A1.16,1.16,0,0,0,439.47,443.37Z"/>
                        <path class="cls-104" d="M432.46,443.52a2.18,2.18,0,0,0,.78-.85,1.47,1.47,0,0,1,.36-.36,1.33,1.33,0,0,0-1,.43,1.73,1.73,0,0,0-.58,1.16C432.14,443.72,432.32,443.64,432.46,443.52Z"/>
                        <path class="cls-104" d="M439.13,441.62a2.68,2.68,0,0,1-1,.29,1.46,1.46,0,0,0-.42.26,1.39,1.39,0,0,1,.71-.81,1.37,1.37,0,0,1,1.46.36C439.57,441.59,439.33,441.5,439.13,441.62Z"/>
                        <path class="cls-105" d="M443.12,445c-.33,0-.73.56-1,.76a5.49,5.49,0,0,0-.92.88c-.14.17-.63,1-.12.94s.58-.74.77-1a3.5,3.5,0,0,1,.88-.92c.14-.1.57-.28.6-.47s-.38-.16-.47,0Z"/>
                        <path class="cls-105" d="M438.51,446.25c0-.23,0-.95-.16-1.11a.19.19,0,0,0-.21,0c-.23.07,0,.79,0,1s-.14,1.11.08,1.15S438.53,446.42,438.51,446.25Z"/>
                        <path class="cls-108" d="M421,436.81c-.14-.15-1.68.58-2.83,2.61-.95,1.66-1.3,3.54-.83,3.82s2.5-.21,3.49-2C422.07,439,421.57,437.41,421,436.81Z"/>
                        <path class="cls-109" d="M420.27,440.25c.36.06.61-.38.84-1.45a1.68,1.68,0,0,0-.14-1.3c-.28-.37-.71,0-.73.34s.17.76.08,1.16S419.8,440.16,420.27,440.25Z"/>
                        <path class="cls-102" d="M424.23,446.2a6.11,6.11,0,0,0-1.71-1.9c-1-.71-2.66-1.72-2.75-1.8s-.16-.54.34-1.19,1-.57,1-.57a12,12,0,0,1,2.3,1.91,8.35,8.35,0,0,1,1.83,3.44Z"/>
                        <path class="cls-103" d="M423.49,446.7c-.35.46-1.3.25-1.65-.17-.07.69,1,1.47,1.7,1.42a13.46,13.46,0,0,1,3.43-1.64,2.08,2.08,0,0,0,0-1.85,2.84,2.84,0,0,1-1.31,1.25c.4-.72-.11-1.46-.65-2a2.59,2.59,0,0,0-.84,2,8.18,8.18,0,0,0-.92-.53,2.34,2.34,0,0,0-1.54,0A1.88,1.88,0,0,0,423.49,446.7Z"/>
                        <path class="cls-104" d="M425,445a2,2,0,0,0-.21,1,1.38,1.38,0,0,1-.11.46,1.24,1.24,0,0,0,.54-.79,1.63,1.63,0,0,0-.09-1.19A1.23,1.23,0,0,1,425,445Z"/>
                        <path class="cls-104" d="M422.79,445.72a2.7,2.7,0,0,1,.89.58.83.83,0,0,0,.48.29,1.44,1.44,0,0,1-1-.22,1.57,1.57,0,0,1-.78-.9A1,1,0,0,0,422.79,445.72Z"/>
                        <path class="cls-104" d="M426.33,445.91a2,2,0,0,0-.79.71,1.32,1.32,0,0,1-.36.3,1.21,1.21,0,0,0,.91-.32,1.56,1.56,0,0,0,.63-1C426.64,445.75,426.47,445.81,426.33,445.91Z"/>
                        <path class="cls-104" d="M423,447.36a2.46,2.46,0,0,1,1-.19,1.09,1.09,0,0,0,.41-.2,1.28,1.28,0,0,1-.73.68,1.23,1.23,0,0,1-1.3-.44C422.55,447.35,422.76,447.45,423,447.36Z"/>
                        <path class="cls-102" d="M425.73,438.76a6,6,0,0,1-2.52.44,15.58,15.58,0,0,1-1.66-.14c-.14,0-.44.41-.6.82-.3.77-.05.89-.05.89s.09.33,2,.27a6.45,6.45,0,0,0,3.57-1.57Z"/>
                        <path class="cls-103" d="M426.66,440.08c.48.33.32,1.28-.09,1.66.69,0,1.43-1,1.34-1.77a2.22,2.22,0,0,0-.84-1.29s.14-1.51-.95-2.06a2.07,2.07,0,0,0-1.86.07,2.78,2.78,0,0,1,1.31,1.25c-.74-.37-1.45.18-1.93.73a2.58,2.58,0,0,0,2,.76,6.37,6.37,0,0,0-.48.94,2.38,2.38,0,0,0,0,1.54A1.87,1.87,0,0,0,426.66,440.08Z"/>
                        <path class="cls-104" d="M424.91,438.67a1.93,1.93,0,0,0,1,.17,1.25,1.25,0,0,1,.46.09,1.22,1.22,0,0,0-.81-.5,1.58,1.58,0,0,0-1.19.14A1.16,1.16,0,0,1,424.91,438.67Z"/>
                        <path class="cls-104" d="M425.72,440.82a2.75,2.75,0,0,1,.53-.91.86.86,0,0,0,.27-.5,1.45,1.45,0,0,1-.17,1,1.62,1.62,0,0,1-.86.83A1.2,1.2,0,0,0,425.72,440.82Z"/>
                        <path class="cls-104" d="M425.74,437.28a2,2,0,0,0,.75.75,1.52,1.52,0,0,1,.32.34,1.2,1.2,0,0,0-.36-.88,1.65,1.65,0,0,0-1-.59C425.57,437,425.64,437.14,425.74,437.28Z"/>
                        <path class="cls-104" d="M427.35,440.58a2.4,2.4,0,0,1-.23-1,1.34,1.34,0,0,0-.22-.4,1.3,1.3,0,0,1,.71.69,1.26,1.26,0,0,1-.38,1.32C427.36,441,427.45,440.77,427.35,440.58Z"/>
                        <path class="cls-105" d="M424.11,444.12c0-.31-.48-.7-.66-.95a4.74,4.74,0,0,0-.77-.89c-.15-.13-.93-.62-.86-.15s.66.57.9.75a3.28,3.28,0,0,1,.81.85c.08.13.23.53.41.57s.16-.35,0-.43Z"/>
                        <path class="cls-105" d="M423.11,439.82c.22,0,.88,0,1-.11a.16.16,0,0,0,0-.18c-.05-.22-.72-.06-.9-.06s-1-.18-1.06,0S423,439.84,423.11,439.82Z"/>
                        <path class="cls-106" d="M428.82,440.22a34.08,34.08,0,0,1-.43-4.72c0-1.4.34-2.77.44-4.16a14.73,14.73,0,0,0-.3-4.24,2.88,2.88,0,0,1,.92,2.22c.08,1.76-.47,3.48-.6,5.24a21.09,21.09,0,0,0,.1,3.37c.16,1.85.34,3.71.58,5.55a18.47,18.47,0,0,1,.26,4.13,37.21,37.21,0,0,1-.77,3.75,19.74,19.74,0,0,0-.29,5,24.54,24.54,0,0,1,.41,3.77c-1.11-1.16-1-3.62-.9-5.07.24-3.19.64-6.37.75-9.57A37.56,37.56,0,0,0,428.82,440.22Z"/>
                        <path class="cls-108" d="M433.38,436.54c0,.2,1.72.45,3.81-.59,1.71-.85,3.05-2.22,2.81-2.71s-2.2-1.22-4-.26C433.71,434.18,433.26,435.74,433.38,436.54Z"/>
                        <path class="cls-109" d="M435.92,434.11c-.26-.25-.71,0-1.5.73a1.67,1.67,0,0,0-.61,1.17c0,.46.58.41.8.12s.28-.73.58-1S436.27,434.44,435.92,434.11Z"/>
                        <path class="cls-102" d="M436,427a6,6,0,0,0,.36,2.53c.42,1.13,1.25,2.91,1.29,3s-.17.53-1,.79a1.14,1.14,0,0,1-1.13-.07,11.59,11.59,0,0,1-.85-2.86,8.39,8.39,0,0,1,.4-3.88Z"/>
                        <path class="cls-103" d="M436.84,427c.55-.19,1.22.51,1.28,1.06.44-.53,0-1.77-.62-2.13a2.28,2.28,0,0,0-1.55-.09,2.2,2.2,0,0,0-2.22-.46,2.1,2.1,0,0,0-1,1.53,2.85,2.85,0,0,1,1.78-.31c-.73.38-.72,1.28-.56,2a2.61,2.61,0,0,0,1.8-1.16,6.87,6.87,0,0,0,.47.94,2.4,2.4,0,0,0,1.25.9A1.88,1.88,0,0,0,436.84,427Z"/>
                        <path class="cls-104" d="M434.67,427.53a1.9,1.9,0,0,0,.76-.74c.05-.13.34-.32.34-.32a1.24,1.24,0,0,0-.89.36,1.55,1.55,0,0,0-.58,1C434.37,427.71,434.54,427.64,434.67,427.53Z"/>
                        <path class="cls-104" d="M436.88,428.16a2.82,2.82,0,0,1-.42-1,.82.82,0,0,0-.24-.51c.3.06.59.49.73.75a1.57,1.57,0,0,1,.14,1.18C437.09,428.43,437,428.31,436.88,428.16Z"/>
                        <path class="cls-104" d="M434,426a1.9,1.9,0,0,0,1-.15,1.53,1.53,0,0,1,.47-.05,1.22,1.22,0,0,0-.93-.24,1.58,1.58,0,0,0-1.09.49A1.19,1.19,0,0,1,434,426Z"/>
                        <path class="cls-104" d="M437.65,426.7a2.41,2.41,0,0,1-.92-.39,1.24,1.24,0,0,0-.45-.06,1.31,1.31,0,0,1,1-.16,1.28,1.28,0,0,1,.84,1.1C438,426.94,437.86,426.74,437.65,426.7Z"/>
                        <path class="cls-102" d="M430.56,432.3a6.13,6.13,0,0,1,2.33,1c1,.71,1.24,1,1.31,1s.59-.09,1-.34c.68-.48.53-.71.53-.71s.1-.33-1.49-1.33a6.45,6.45,0,0,0-3.84-.68Z"/>
                        <path class="cls-103" d="M430.52,430.69c-.22-.54.45-1.24,1-1.33-.55-.41-1.77.08-2.1.72a2.25,2.25,0,0,0,0,1.55,2.21,2.21,0,0,0-.35,2.24,2.06,2.06,0,0,0,1.57,1,2.8,2.8,0,0,1-.39-1.76c.41.71,1.31.65,2,.46A2.64,2.64,0,0,0,431,431.8a7,7,0,0,0,.92-.51,2.37,2.37,0,0,0,.83-1.29A1.87,1.87,0,0,0,430.52,430.69Z"/>
                        <path class="cls-104" d="M431.19,432.83a2,2,0,0,0-.78-.72c-.13-.05-.33-.33-.33-.33a1.19,1.19,0,0,0,.4.87,1.57,1.57,0,0,0,1.06.54C431.38,433.12,431.3,433,431.19,432.83Z"/>
                        <path class="cls-104" d="M431.71,430.6a2.67,2.67,0,0,1-.95.46.83.83,0,0,0-.49.26c0-.3.46-.61.71-.76a1.63,1.63,0,0,1,1.18-.2A1.16,1.16,0,0,0,431.71,430.6Z"/>
                        <path class="cls-104" d="M429.72,433.53a1.9,1.9,0,0,0-.2-1,1.36,1.36,0,0,1-.07-.46,1.23,1.23,0,0,0-.2.94,1.59,1.59,0,0,0,.54,1.06A1.05,1.05,0,0,1,429.72,433.53Z"/>
                        <path class="cls-104" d="M430.23,429.9a2.72,2.72,0,0,1-.35.93,1.11,1.11,0,0,0,0,.45,1.3,1.3,0,0,1-.21-1,1.28,1.28,0,0,1,1.06-.89C430.45,429.55,430.25,429.68,430.23,429.9Z"/>
                        <path class="cls-105" d="M434.88,428.76c-.14.27,0,.85,0,1.15a5.59,5.59,0,0,0,.15,1.17c.05.19.43,1,.64.6s-.24-.84-.33-1.12a3.2,3.2,0,0,1-.2-1.15c0-.16.09-.58,0-.71s-.33.2-.24.36Z"/>
                        <path class="cls-105" d="M433.32,432.88c-.19-.1-.7-.51-.91-.48a.16.16,0,0,0-.13.14c-.08.21.57.44.72.54s.74.72.89.57S433.46,433,433.32,432.88Z"/>
                        <path class="cls-107" d="M433.05,420.4a18,18,0,0,1-1.11,3.06,20.33,20.33,0,0,1-3,4.23,8.52,8.52,0,0,1,2.27,1.1c.49.4,2.21,2,2.21,2s1.26-3.4,1.58-4.38c.92-2.8,1.5-4.44,1.5-4.44Z"/>
                        <path class="cls-110" d="M420.52,423a1.26,1.26,0,0,0,.33.7c.46.63.79,1.36,1.21,2a3.48,3.48,0,0,0,1.74,1.52.58.58,0,0,0,.6-.06.72.72,0,0,0,.09-.2,1.45,1.45,0,0,0-.32-1.24,8.26,8.26,0,0,0-.92-1,5.29,5.29,0,0,1-1.13-1.78,2.23,2.23,0,0,0-.27-.61C421.44,421.83,420.54,422.39,420.52,423Z"/>
                        <path class="cls-91" d="M408.11,456.16a2.36,2.36,0,0,1,1.32.38c.49.35.63.88.94,1.37v0a2.46,2.46,0,0,0,1.37.77,4.43,4.43,0,0,1,1.49.61,3.57,3.57,0,0,1,1,1.19,6.86,6.86,0,0,0,1.31,1.38l0,0c.39.38.73.87.49,1.4s-.88.43-1.33.26a2.42,2.42,0,0,1-.9-.62c-.31-.32-1.09-1.26-1.52-.6a1.82,1.82,0,0,0-.08,1.13,17.41,17.41,0,0,0,.19,2,6.16,6.16,0,0,1,2.58,2.84c.26.79-.16,1.83-1.08,1.33a3,3,0,0,1-.82-.74,7.64,7.64,0,0,1-1.66-.59,2.82,2.82,0,0,1-.8-.44c-.5.18-1.05-.18-1.46-.54h0a2.24,2.24,0,0,1-1.3-1.06c-.26-.41-.47-.84-.7-1.26-.1-.18-.22-.35-.32-.53a.11.11,0,0,1-.11-.08,9.3,9.3,0,0,1-.35-3.6c0-.69.08-1.37.05-2.06,0-.32,0-.65-.05-1s-.12-.64-.13-1c0-.79,1.32-.72,1.82-.7"/>
                        <path class="cls-111" d="M414.19,468.24c-.18-.25-.25-.56-.41-.82a2.55,2.55,0,0,0-.58-.6,3.68,3.68,0,0,1-.61-.57,1,1,0,0,1-.23-.78,4.12,4.12,0,0,0,.87.9,8.84,8.84,0,0,1,1.22,1.06,2.24,2.24,0,0,1,.49.86c0,.09.12.36,0,.43s-.29-.06-.36-.11a1.53,1.53,0,0,1-.43-.37"/>
                        <path class="cls-92" d="M407,458.4a2.53,2.53,0,0,1,1.81.84,7.27,7.27,0,0,1,1.14,1.69l-.42-.51c0,.61-.09,1.23-.14,1.84l-.95-1.46c.06.39.11.79.17,1.18a2.05,2.05,0,0,1-.7-2.1l-.58.72V460a6.06,6.06,0,0,0,.87,6.06l-.3-1.35a5.05,5.05,0,0,0,2.55,3,6.26,6.26,0,0,1-1.46-4.38,5.81,5.81,0,0,0,3.93,5.22,6.66,6.66,0,0,1-2.59-5.53,9.39,9.39,0,0,0,3.89,6.1,1,1,0,0,0,.65.23.71.71,0,0,0,.18-.08.7.7,0,0,1-1.1.43,3,3,0,0,1-.82-.74,7.64,7.64,0,0,1-1.66-.59,2.82,2.82,0,0,1-.8-.44c-.5.18-1.05-.18-1.46-.54h0a2.24,2.24,0,0,1-1.3-1.06c-.26-.41-.47-.84-.7-1.26-.1-.18-.22-.35-.32-.53a.11.11,0,0,1-.11-.08,9.3,9.3,0,0,1-.35-3.6c0-.69.08-1.37.05-2.06,0-.1,0-.21,0-.32a1.67,1.67,0,0,1,.55-.09"/>
                        <path class="cls-92" d="M410.37,458a2.46,2.46,0,0,0,1.37.77,4.43,4.43,0,0,1,1.49.61,3.57,3.57,0,0,1,1,1.19,6.86,6.86,0,0,0,1.31,1.38l0,0c.39.38.73.87.49,1.4s-.7.45-1.12.33a.8.8,0,0,0,.3-.09.52.52,0,0,0,.29-.45c0-.3-.32-.48-.58-.63a4.11,4.11,0,0,1-1.81-2.34,1.25,1.25,0,0,0-.15-.36.35.35,0,0,0-.32-.16.23.23,0,0,0-.17.3l-.42-.32v1.63c-.24-.62-.47-1.24-.7-1.86,0,.51-.05,1-.07,1.54l-.35-.47.23,1.54a3.87,3.87,0,0,1-1.41-3.36,2.68,2.68,0,0,1,.35-1.1,3.47,3.47,0,0,0,.21.37v0"/>
                        <path class="cls-95" d="M408.11,456.16c-.5,0-1.84-.09-1.82.7,0,.34.12.65.13,1s0,.65.05,1c0,.69,0,1.37-.05,2.06a9.3,9.3,0,0,0,.35,3.6.11.11,0,0,0,.11.08c.1.18.22.35.32.53.23.42.44.85.7,1.26a2.24,2.24,0,0,0,1.3,1.06h0c.41.36,1,.72,1.46.54a2.82,2.82,0,0,0,.8.44,7.64,7.64,0,0,0,1.66.59,3,3,0,0,0,.82.74c.92.5,1.34-.54,1.08-1.33a6.16,6.16,0,0,0-2.58-2.84,17.41,17.41,0,0,1-.19-2,1.82,1.82,0,0,1,.08-1.13c.43-.66,1.21.28,1.52.6a2.42,2.42,0,0,0,.9.62c.45.17,1.1.27,1.33-.26s-.1-1-.49-1.4l0,0a6.86,6.86,0,0,1-1.31-1.38,3.57,3.57,0,0,0-1-1.19,4.43,4.43,0,0,0-1.49-.61,2.46,2.46,0,0,1-1.37-.77v0c-.31-.49-.45-1-.94-1.37a2.36,2.36,0,0,0-1.32-.38m-1.46,1.29c-.07-.36-.21-.78.25-.92a3.92,3.92,0,0,1,1.08-.1,2.21,2.21,0,0,1,1.52.45,6.81,6.81,0,0,1,.64.88c.46,1.09,1.88,1.08,2.78,1.63a5.78,5.78,0,0,1,1.39,1.6,4.76,4.76,0,0,0,1.09,1,1.63,1.63,0,0,1,.46.77c.11.57-.23.81-.75.68a2.2,2.2,0,0,1-1.11-.62,3.18,3.18,0,0,0-1-.78c-.58-.25-.88.2-.93.72a9.91,9.91,0,0,0,0,1.09,11.21,11.21,0,0,0,.1,1.74c0,.08.08.12.13.11a5.64,5.64,0,0,0,1.12,1,4.32,4.32,0,0,1,1.11,1.22c.22.41.61,1.38,0,1.71-.4.25-.84-.21-1.1-.48s-.47-.61-.74-.9-.84-.77-1.23-1.18a5.41,5.41,0,0,1-1.12-3.32s-.08,0-.08,0a4.65,4.65,0,0,0,1.27,3.69,16.92,16.92,0,0,1,1.33,1.35c-.4-.17-.8-.36-1.22-.52a3,3,0,0,1-1.36-.9,6.29,6.29,0,0,1-.87-1.36,5.29,5.29,0,0,1-.48-1.78.05.05,0,0,0-.1,0,4.81,4.81,0,0,0,1.19,3.17,4.22,4.22,0,0,0,.41.43,2.64,2.64,0,0,1-1.6-1,6.33,6.33,0,0,1-1-2c0-.05-.11,0-.1,0a3.84,3.84,0,0,0,1,2.23,2.3,2.3,0,0,1-.34-.28,4,4,0,0,1-.54-.82c-.32-.56-.65-1.12-.95-1.68a10.56,10.56,0,0,1-.36-3c0-1,.15-2,.1-3.06a4,4,0,0,0-.06-.7"/>
                        <path class="cls-97" d="M408.34,458.77,406.89,460s-.17-1.67-.26-3.19c-.41-2.92-.81-5-.06-8.13.87-3.67,6-2,6.11.89.06,1.91.12,3.55.38,6.3a9.77,9.77,0,0,1-.5,3.31l-.14-.47-.5,1.84-.33-.9a1.31,1.31,0,0,0-.31,1,5.81,5.81,0,0,0,.84,1.94s-2.41-.27-3.23-1.66Z"/>
                        <path class="cls-96" d="M405.91,456.44a12.56,12.56,0,0,0,.66,3.08l1.05-1.17.84,2.68.55-1.92.23,1.48c.11.63,1.93,1.28,1.93,1.28a2.14,2.14,0,0,1-.18-2.14,3.44,3.44,0,0,0,.55-1.92l.3,1a9.7,9.7,0,0,0,.5-3.3c-.26-2.76-.32-4.39-.38-6.31-.07-2.92-5.24-4.55-6.1-.89-.76,3.19-.36,5.22.05,8.14"/>
                        <path class="cls-98" d="M405.91,456.44a12.56,12.56,0,0,0,.66,3.08l1.05-1.17.84,2.68.55-1.92.23,1.48c.11.63,1.93,1.28,1.93,1.28a2.14,2.14,0,0,1-.18-2.14,3.44,3.44,0,0,0,.55-1.92l.3,1a9.7,9.7,0,0,0,.5-3.3c-.26-2.76-.32-4.39-.38-6.31-.07-2.92-5.24-4.55-6.1-.89C405.1,451.49,405.5,453.52,405.91,456.44Z"/>
                        <path class="cls-97" d="M413.16,445.66a34.58,34.58,0,0,1,4.33-12c3.51-5.77-2.56-7.3-5.06-3.92s-4.91,11.6-5.22,14.53,4.63,6.9,6,1.37"/>
                        <path class="cls-97" d="M412.27,444.39a7.16,7.16,0,0,1,.44,1.95c.07,1.07,0,2.77-2.74,3s-4.46-2.64-3.63-5.31,5.93.36,5.93.36"/>
                        <path class="cls-96" d="M412.42,445.62a34.58,34.58,0,0,1,4.33-12c3.51-5.77-2.56-7.31-5.06-3.93s-4.91,11.61-5.22,14.53,4.63,6.91,5.95,1.38"/>
                        <path class="cls-98" d="M412.42,445.62a34.58,34.58,0,0,1,4.33-12c3.51-5.77-2.56-7.31-5.06-3.93s-4.91,11.61-5.22,14.53S411.1,451.15,412.42,445.62Z"/>
                        <path class="cls-101" d="M407.85,435.3l7.9,3.55,3.21-7.43,1.27-3.68-.4-2.37-1.58-2.18-2.07-.54-1.37.26-1.13.39-.43.52Z"/>
                        <path class="cls-108" d="M415.16,434.19c.35-.58-.19-2.51-2-3.5a5.5,5.5,0,0,0-2.77-.77l-.9,1.91a7.17,7.17,0,0,0,1.86,1.51C413,434.29,414.89,434.66,415.16,434.19Z"/>
                        <path class="cls-109" d="M409.78,431.29c.4,0,.76-.17,1.17-.08s1.16.53,1.24.06-.37-.61-1.43-.84a3.28,3.28,0,0,0-.56-.08l-.44.93Z"/>
                        <path class="cls-102" d="M418.16,427.32a6,6,0,0,0-1.91,1.7c-.71,1-1.74,2.65-1.82,2.74a1.29,1.29,0,0,1-1.19-.35c-.64-.51-.56-1-.56-1a11.69,11.69,0,0,1,1.92-2.29,8.4,8.4,0,0,1,3.45-1.81Z"/>
                        <path class="cls-103" d="M418.65,428.06c.46.36.25,1.3-.17,1.66.68.07,1.47-1,1.43-1.69a2.24,2.24,0,0,0-.78-1.34,2.21,2.21,0,0,0-.84-2.11,2,2,0,0,0-1.85,0,2.77,2.77,0,0,1,1.24,1.31c-.72-.4-1.46.1-2,.63a2.62,2.62,0,0,0,2,.86,6.35,6.35,0,0,0-.54.92,2.38,2.38,0,0,0-.05,1.53A1.86,1.86,0,0,0,418.65,428.06Z"/>
                        <path class="cls-104" d="M417,426.57a1.89,1.89,0,0,0,1,.22,1.33,1.33,0,0,1,.45.12,1.17,1.17,0,0,0-.79-.55,1.58,1.58,0,0,0-1.19.09A1,1,0,0,1,417,426.57Z"/>
                        <path class="cls-104" d="M417.67,428.76a3,3,0,0,1,.58-.89.76.76,0,0,0,.29-.48,1.38,1.38,0,0,1-.22,1,1.57,1.57,0,0,1-.9.78A1,1,0,0,0,417.67,428.76Z"/>
                        <path class="cls-104" d="M417.88,425.22a2,2,0,0,0,.7.79,1.37,1.37,0,0,1,.31.36,1.22,1.22,0,0,0-.32-.9,1.52,1.52,0,0,0-1-.64C417.72,424.91,417.78,425.08,417.88,425.22Z"/>
                        <path class="cls-104" d="M419.31,428.6a2.52,2.52,0,0,1-.18-1,1.09,1.09,0,0,0-.2-.41,1.31,1.31,0,0,1,.68.73,1.26,1.26,0,0,1-.45,1.3C419.3,429,419.4,428.8,419.31,428.6Z"/>
                        <path class="cls-102" d="M411.15,428.29A13.25,13.25,0,0,1,411,430c0,.14.41.45.82.62.77.3.88,0,.88,0s.33-.08.29-2a5.69,5.69,0,0,0-.81-2.57Z"/>
                        <path class="cls-103" d="M412.31,426.37a2.37,2.37,0,0,0,1.54,0,1.88,1.88,0,0,0-1.16-1.37l-.61,1.29Z"/>
                        <path class="cls-103" d="M413.69,425a1.21,1.21,0,0,0-.56-.94l-.26.56A1.37,1.37,0,0,1,413.69,425Z"/>
                        <path class="cls-105" d="M416.07,427.42c-.3,0-.7.48-.95.66a5.08,5.08,0,0,0-.89.77c-.14.14-.63.93-.15.86s.57-.66.75-.89a3.12,3.12,0,0,1,.85-.81c.14-.08.54-.23.58-.41s-.35-.17-.43,0Z"/>
                        <path class="cls-105" d="M411.73,428.61c0-.16,0-.68-.07-.79a.11.11,0,0,0-.14,0c-.17,0-.06.56-.06.7s-.15.78,0,.82S411.74,428.74,411.73,428.61Z"/>
                        <path class="cls-112" d="M471,398.84a8.43,8.43,0,1,1-8.1-8.61A8.36,8.36,0,0,1,471,398.84Z"/>
                        <path class="cls-113" d="M460.79,390.4a4.86,4.86,0,0,0-.78,3.06,17.38,17.38,0,0,0,1.26,4.53,7.88,7.88,0,0,1,.49,4.63c-.22.76-.63,1.56-.34,2.3.38.94,1.64,1.12,2.65,1a8.65,8.65,0,0,0,5.67-3.58,8.76,8.76,0,0,0,1.08-2.19,8.43,8.43,0,1,1-10-9.71Z"/>
                        <path class="cls-114" d="M470.48,399.11a10.26,10.26,0,0,0-1.09-1.61c-.71-.92-1.65-2-2.62-3.05a24.45,24.45,0,0,0-2.77-2.74,14.09,14.09,0,0,0-1.61-1.11,3.61,3.61,0,0,1,.53-.22,5,5,0,0,1,1.56-.26,6.34,6.34,0,0,1,4.76,2.09A6.92,6.92,0,0,1,471,397a5.38,5.38,0,0,1-.27,1.56A3.35,3.35,0,0,1,470.48,399.11Z"/>
                        <path class="cls-115" d="M467.58,399.08c-.13,3.3-3.21,5.85-6.87,5.71s-6.53-2.94-6.4-6.24,3.2-5.85,6.87-5.7S467.71,395.78,467.58,399.08Z"/>
                        <path class="cls-116" d="M460,392.89a3.29,3.29,0,0,0,.39,2.37c.71,1.63,3.19,2.42,2.07,4.61s-1.89,2.54-1.09,4.91h-.66c-3.67-.15-6.53-2.94-6.4-6.24A6.2,6.2,0,0,1,460,392.89Z"/>
                        <path class="cls-117" d="M398.29,388.91s3.82-1,4.85,2.5c.71,2.48-.2,5.11-.86,7.23a19.8,19.8,0,0,0-.63,4.82,32,32,0,0,0,.29,3.79c.19,2.17-2.11,3.26-3.12,2.53s1.09-4.7,1.09-4.7l-2.23-16.26Z"/>
                        <path class="cls-112" d="M386.81,400.25a10.49,10.49,0,0,0,11.45,9.43c5.82-.51,1.21-3.58,3.71-11.59,2-6.54.28-9.64-5.54-9.12A10.47,10.47,0,0,0,386.81,400.25Z"/>
                        <path class="cls-113" d="M395.7,389.06c-2.65,1.64-7.87,5.65-6.76,11.24,1.49,7.42,2.67,3.88,6.79,4.88,2.64.64,4.31.51,5.47-.51.21,3.23.89,4.67-2.94,5a10.39,10.39,0,0,1-2.56-20.62Z"/>
                        <path class="cls-113" d="M388,400.65v-.1c0-.07,0-.17,0-.3a10.71,10.71,0,0,1,.13-1.07,11.23,11.23,0,0,1,.4-1.56,10.72,10.72,0,0,1,.82-1.78,10.38,10.38,0,0,1,1.15-1.58,9.75,9.75,0,0,1,1.16-1.11,9.12,9.12,0,0,1,.87-.65l.25-.15.09-.06-.09,0-.26.14a9.69,9.69,0,0,0-.92.6,9.41,9.41,0,0,0-1.2,1.08,9.24,9.24,0,0,0-1.19,1.6,8.7,8.7,0,0,0-.81,1.82,9.77,9.77,0,0,0-.35,1.58,8.77,8.77,0,0,0-.08,1.09c0,.13,0,.23,0,.3Z"/>
                        <path class="cls-113" d="M389,402.59l0-.4c0-.26-.05-.63-.08-1.1a13.69,13.69,0,0,1,0-1.62,8.62,8.62,0,0,1,.27-2,5.68,5.68,0,0,1,.79-1.8,5.41,5.41,0,0,1,1.09-1.17,9.82,9.82,0,0,1,.89-.64l.34-.22-.35.19a9,9,0,0,0-.93.6,5.29,5.29,0,0,0-1.16,1.16,5.92,5.92,0,0,0-.84,1.83,8,8,0,0,0-.24,2,12.87,12.87,0,0,0,.09,1.63c.05.46.11.84.15,1.09Z"/>
                        <path class="cls-113" d="M388.33,401.38a2.44,2.44,0,0,0,.08-.3c0-.2.1-.49.15-.85s.1-.79.15-1.26.1-1,.21-1.54a6.75,6.75,0,0,1,.45-1.46,4.34,4.34,0,0,1,.69-1.05,4.55,4.55,0,0,1,.61-.59l.24-.2-.26.18a3.93,3.93,0,0,0-.65.56,3.77,3.77,0,0,0-.75,1,5.8,5.8,0,0,0-.5,1.49,13.59,13.59,0,0,0-.19,1.55l-.08,1.27c0,.36-.07.65-.1.85A2.1,2.1,0,0,1,388.33,401.38Z"/>
                        <path class="cls-113" d="M391.91,405.53l-.12,0a2.08,2.08,0,0,1-.33-.11,3.34,3.34,0,0,1-1.08-.71,4.32,4.32,0,0,1-.56-.68,4.85,4.85,0,0,1-.46-.91,7.24,7.24,0,0,1-.41-2.3,6.88,6.88,0,0,1,.05-1.21,9,9,0,0,1,.18-1.12,8.85,8.85,0,0,1,.3-1,6.33,6.33,0,0,1,.34-.82,6.67,6.67,0,0,1,.34-.66l.29-.48.21-.29.07-.1-.08.1a3.48,3.48,0,0,0-.22.28c-.09.12-.2.27-.32.46s-.24.4-.37.65a8,8,0,0,0-.37.82,7.17,7.17,0,0,0-.32,1,8,8,0,0,0-.21,1.14,7.09,7.09,0,0,0-.06,1.23,6.73,6.73,0,0,0,.45,2.35,5.32,5.32,0,0,0,.49.92,3.72,3.72,0,0,0,.61.68,3.36,3.36,0,0,0,1.12.68,3,3,0,0,0,.34.09Z"/>
                        <path class="cls-113" d="M391.35,404.73a2,2,0,0,1-.21-.16,4.34,4.34,0,0,1-.53-.46,4.89,4.89,0,0,1-.65-.82,4.68,4.68,0,0,1-.53-1.15,4.78,4.78,0,0,1-.2-1.25,4.73,4.73,0,0,1,.08-1,5.11,5.11,0,0,1,.17-.68l.09-.25-.11.24a4.38,4.38,0,0,0-.24.67,4.65,4.65,0,0,0-.13,1.06,4.21,4.21,0,0,0,.75,2.48,4.42,4.42,0,0,0,.71.8,5,5,0,0,0,.57.43Z"/>
                        <path class="cls-113" d="M392.28,406.18,392,406a7.22,7.22,0,0,1-.62-.51,6.63,6.63,0,0,1-.77-.9,6.21,6.21,0,0,1-.69-1.28,6.07,6.07,0,0,1-.37-1.4,7.08,7.08,0,0,1,0-1.19,7.46,7.46,0,0,1,.1-.8c0-.19.07-.29.07-.29a2.75,2.75,0,0,0-.09.29,5.11,5.11,0,0,0-.16.79,5.4,5.4,0,0,0,0,1.22,5.8,5.8,0,0,0,.35,1.44,5.37,5.37,0,0,0,.73,1.3,5.11,5.11,0,0,0,.84.88,4,4,0,0,0,.66.47Z"/>
                        <path class="cls-113" d="M389.59,393.86l.05-.08.17-.24c.15-.2.38-.49.68-.82a9.41,9.41,0,0,1,1.15-1.06,10.14,10.14,0,0,1,1.61-1,9.92,9.92,0,0,1,1.79-.71,11.19,11.19,0,0,1,1.54-.32,9.73,9.73,0,0,1,1.06-.07h.29l-.29,0a8.08,8.08,0,0,0-1.07,0,8.67,8.67,0,0,0-1.57.26,8.8,8.8,0,0,0-1.82.7,8.7,8.7,0,0,0-1.63,1.08,8.43,8.43,0,0,0-1.12,1.12,8.81,8.81,0,0,0-.64.86c-.07.1-.12.19-.15.24Z"/>
                        <path class="cls-113" d="M399.91,390.28l-.41-.09a10.15,10.15,0,0,0-1.12-.17,9.88,9.88,0,0,0-3.74.35,10.05,10.05,0,0,0-1,.38,9.26,9.26,0,0,0-.89.46,8.32,8.32,0,0,0-1.35,1,7,7,0,0,0-.76.84,2.71,2.71,0,0,0-.18.25l-.07.09.07-.09.2-.23a6.59,6.59,0,0,1,.8-.8,8.53,8.53,0,0,1,1.37-1,6.56,6.56,0,0,1,.88-.44,8.85,8.85,0,0,1,1-.37,10.35,10.35,0,0,1,2-.39,12.28,12.28,0,0,1,1.68,0c.48,0,.86.07,1.13.11Z"/>
                        <path class="cls-115" d="M390.55,400.29c.36,4.13,3.31,7.89,8.88,7.1.87-.12-.79-3,.55-9.18.89-4,3.22-6.38-1.79-6.44C393.59,391.72,390.18,396.17,390.55,400.29Z"/>
                        <path class="cls-118" d="M392.49,405.12a8.29,8.29,0,0,1,3.24.06,9.07,9.07,0,0,0,3.84.29c.13,1.24.25,1.87-.14,1.92A7.34,7.34,0,0,1,392.49,405.12Z"/>
                        <path class="cls-118" d="M391.42,399.86a5.4,5.4,0,0,1-.05-.69,6.29,6.29,0,0,1,.25-1.91,6.82,6.82,0,0,1,1.39-2.55,7.07,7.07,0,0,1,3-2,7.66,7.66,0,0,1,3.56-.36,2.77,2.77,0,0,1,1.55.61,1.5,1.5,0,0,1,.42,1.42,4.25,4.25,0,0,1-.35,1.06,6.78,6.78,0,0,1-.79,1.31,7,7,0,0,0,.54-1.4,5,5,0,0,0,.19-1,1,1,0,0,0-.38-.94,2.43,2.43,0,0,0-1.25-.34,8.13,8.13,0,0,0-3.21.45,7.23,7.23,0,0,0-2.73,1.69A7.09,7.09,0,0,0,392,397.4a6.51,6.51,0,0,0-.52,1.78A6.27,6.27,0,0,0,391.42,399.86Z"/>
                        <path class="cls-96" d="M395.56,398.44c1.67-16.52,16.34-28.93,33.39-28.25A32.58,32.58,0,0,1,451.4,380.3,30.82,30.82,0,0,1,460,402.9c0,.46-.14,2.07-.18,2.52-1.05-6.69-8.75-8.48-8.75-8.48,2.41-10.18-6.14-12.93-6.14-12.93-6.09-2.39-12.62,1.91-15.83,6.77a17.47,17.47,0,0,0-6.82-4.49c-12.24-3.74-18.13,8.25-13.88,18.07-5.57,3.54-7.1,10-6.36,16.25,0,0-1.38-.95-3.81-6.23C395,407.53,395.56,398.53,395.56,398.44Z"/>
                        <path class="cls-113" d="M428.94,370.38a32.36,32.36,0,0,1,23.95,11.9c-6.68-2.87-20.55-7.49-33.64-3.56-18.12,5.43-22.91,21.32-14.91,40.14a26.92,26.92,0,0,1,1.84,5.92,31.56,31.56,0,0,1-7.81-10.48c-3.24-6.88-2.63-15.84-2.63-15.84C397.4,382.12,411.87,369.7,428.94,370.38Z"/>
                        <path class="cls-113" d="M426.35,395.05l-.06-.45a8.37,8.37,0,0,1,0-1.31,11.94,11.94,0,0,1,1.35-4.78,19.93,19.93,0,0,1,1.84-2.91,22.62,22.62,0,0,1,2.66-2.89,15.56,15.56,0,0,1,3.91-2.6,11.83,11.83,0,0,1,11,.46A12.52,12.52,0,0,1,450.8,384a11.49,11.49,0,0,1,1.93,4,11.83,11.83,0,0,1,.35,3.68,11.64,11.64,0,0,1-.54,2.86,11.52,11.52,0,0,1-.84,1.94,7.76,7.76,0,0,1-.72,1.1l-.27.36,0-.45c0-.29-.06-.71-.13-1.24a14.16,14.16,0,0,0-1.18-4,11.4,11.4,0,0,0-1.34-2.19,9,9,0,0,0-1.88-1.81,9.31,9.31,0,0,0-4.91-1.76,12,12,0,0,0-5.52,1.43c-1,.46-1.94,1-2.82,1.49s-1.68,1-2.39,1.5a15.24,15.24,0,0,0-3.15,2.8,9.27,9.27,0,0,0-.75,1Z"/>
                        <path class="cls-113" d="M410.59,409.87s-.47-.38-1.25-1.13a23.3,23.3,0,0,1-3-3.53,17.75,17.75,0,0,1-2.82-6.63,15.39,15.39,0,0,1-.18-4.59,13.44,13.44,0,0,1,1.6-5,12.51,12.51,0,0,1,3.57-4,11.08,11.08,0,0,1,4.73-2,11.85,11.85,0,0,1,4.28.11,14,14,0,0,1,3.26,1.1,19.87,19.87,0,0,1,3.91,2.54c.83.68,1.26,1.1,1.26,1.1h-1.67c-1.06,0-2.59-.08-4.29,0A12.81,12.81,0,0,0,415,389.1a7,7,0,0,0-1.89,1.45,10,10,0,0,0-1.55,2.13,11.69,11.69,0,0,0-1.08,2.59,17.3,17.3,0,0,0-.57,2.9,28.09,28.09,0,0,0,0,5.73c.16,1.75.37,3.26.51,4.31Z"/>
                        <path class="cls-113" d="M412.2,380.19l4.51-.75c1.39-.23,3.05-.5,4.89-.72.92-.11,1.88-.21,2.89-.29s2-.13,3.1-.15,2.11,0,3.12,0l1.48.07c.48,0,.95.06,1.41.11s.92.07,1.35.12.86.1,1.27.15c.82.1,1.58.21,2.28.31l1.87.32c.55.09,1,.19,1.41.26l1.21.25-1.17-.38c-.38-.11-.84-.26-1.39-.4l-1.85-.48c-.69-.16-1.45-.32-2.27-.48l-1.27-.22-1.36-.19c-.46-.07-.94-.11-1.43-.16s-1-.09-1.5-.11c-1-.07-2.09-.08-3.17-.07s-2.15.09-3.17.19-2,.24-2.92.4c-1.85.31-3.5.68-4.87,1s-2.47.64-3.24.85Z"/>
                        <path class="cls-113" d="M400,388.47l.33-.29.4-.36c.16-.14.34-.3.56-.47l.7-.57c.26-.21.56-.42.87-.65s.65-.46,1-.71.76-.49,1.18-.75.86-.49,1.32-.76c.22-.13.47-.25.71-.38l.75-.38c.52-.24,1.05-.5,1.61-.73l.86-.36.88-.33a39.32,39.32,0,0,1,3.84-1.21c1.35-.35,2.76-.65,4.22-.88s2.9-.38,4.3-.48,2.74-.14,4-.14,2.51,0,3.65.09,2.21.15,3.18.24,1.86.19,2.63.28l2,.26,1.25.19.44.06-.43-.1c-.28-.06-.69-.17-1.23-.28s-1.19-.26-2-.4-1.64-.3-2.61-.45-2-.28-3.19-.4-2.39-.2-3.69-.23-2.68,0-4.1,0-2.88.22-4.37.45a39.46,39.46,0,0,0-4.31.94A33.27,33.27,0,0,0,411,381l-.9.37-.85.4c-.57.25-1.09.54-1.61.81l-.75.42c-.24.14-.48.27-.71.42-.45.29-.89.55-1.29.85s-.8.54-1.14.82-.69.52-1,.78l-.83.71-.67.63c-.2.18-.37.36-.51.51l-.37.39Z"/>
                        <path class="cls-113" d="M405.32,410.24l-.32-.34a10.68,10.68,0,0,1-.88-1,13.26,13.26,0,0,1-1.18-1.81,16.65,16.65,0,0,1-1.16-2.65,17.66,17.66,0,0,1-.73-7.6,19.36,19.36,0,0,1,3.49-8.78,22.1,22.1,0,0,1,6.94-6.28,25.37,25.37,0,0,1,7-2.74,27.65,27.65,0,0,1,4.93-.68c1.16-.05,1.81,0,1.81,0l-1.72.53a44.46,44.46,0,0,0-4.49,1.74,34.27,34.27,0,0,0-6,3.52,26.56,26.56,0,0,0-5.77,5.86,21.67,21.67,0,0,0-3.43,7.34,19.35,19.35,0,0,0-.41,6.74,18.46,18.46,0,0,0,.51,2.62,18.7,18.7,0,0,0,.65,2c.22.52.4.93.54,1.2Z"/>
                        <path class="cls-113" d="M400.88,396.51s0-.39.1-1.08a25.76,25.76,0,0,1,.49-2.88,16.63,16.63,0,0,1,1.54-4.2,12.27,12.27,0,0,1,1.56-2.27,12.71,12.71,0,0,1,2.21-2,22.82,22.82,0,0,1,4.75-2.5c1.49-.6,2.86-1.09,4-1.46,2.33-.75,3.83-1.06,3.83-1.06s-1.13,1.06-3.06,2.54c-1,.74-2.13,1.58-3.45,2.45s-2.79,1.78-4.15,2.74a16.87,16.87,0,0,0-3.37,3.11,32.47,32.47,0,0,0-2.34,3.28l-1.54,2.42Z"/>
                        <path class="cls-113" d="M406,415.5a10,10,0,0,1-1.88-1.51,11.93,11.93,0,0,1-3.4-10.51,10.39,10.39,0,0,1,.64-2.32s.44.84,1,2.12a50.1,50.1,0,0,1,1.92,4.85,48,48,0,0,1,1.28,5.05C405.87,414.56,406,415.5,406,415.5Z"/>
                        <path class="cls-113" d="M404.22,413.16a6.8,6.8,0,0,1-1.32-.88,6.66,6.66,0,0,1-2-2.79,6.58,6.58,0,0,1-.25-3.43,6.89,6.89,0,0,1,.45-1.53,9.8,9.8,0,0,1,1.15,1.07,8.23,8.23,0,0,1,1.78,2.75,8.43,8.43,0,0,1,.42,3.25A10.14,10.14,0,0,1,404.22,413.16Z"/>
                        <path class="cls-113" d="M404.53,414.72a7.08,7.08,0,0,1-1.45-.92,7,7,0,0,1-2.66-6.82,7,7,0,0,1,.45-1.65,11.38,11.38,0,0,1,1.16,1.22,10.63,10.63,0,0,1,1.87,3,11.09,11.09,0,0,1,.66,3.47A13.37,13.37,0,0,1,404.53,414.72Z"/>
                        <path class="cls-113" d="M404.5,411.7a7.4,7.4,0,0,1-2.69-9,7.4,7.4,0,0,1,2.69,9Z"/>
                        <path class="cls-113" d="M403.88,410.63a7.5,7.5,0,0,1-1.17-1.2,7.07,7.07,0,0,1-1.28-6.95,7,7,0,0,1,.67-1.53,9.5,9.5,0,0,1,1,1.34,9.3,9.3,0,0,1,1.34,3.24,9.56,9.56,0,0,1-.1,3.5A10.83,10.83,0,0,1,403.88,410.63Z"/>
                        <path class="cls-113" d="M403.85,410.37a5,5,0,0,1-1-.64,3,3,0,0,1-.82-4.22,4.84,4.84,0,0,1,.71-1,6.43,6.43,0,0,1,.94.75,3.65,3.65,0,0,1,1.16,1.87,3.74,3.74,0,0,1-.37,2.17A6.68,6.68,0,0,1,403.85,410.37Z"/>
                        <path class="cls-113" d="M403.64,411.42a5.74,5.74,0,0,1-1.05-.84,4.19,4.19,0,0,1-.88-5.12,5.4,5.4,0,0,1,.71-1.15,8.2,8.2,0,0,1,.94.95,5.23,5.23,0,0,1,1.19,2.35,5.1,5.1,0,0,1-.34,2.6A6.82,6.82,0,0,1,403.64,411.42Z"/>
                        <path class="cls-113" d="M402,411.06a5.45,5.45,0,0,1-1.31-7.74,5.45,5.45,0,0,1,1.31,7.74Z"/>
                        <path class="cls-113" d="M402.86,399.94l-.18-.45a7,7,0,0,1-.34-1.3,8.51,8.51,0,0,1-.09-2,8.74,8.74,0,0,1,.17-1.19,8.17,8.17,0,0,1,.93-2.39,7.44,7.44,0,0,1,.67-1,7.91,7.91,0,0,1,1.42-1.42,7.51,7.51,0,0,1,1.13-.74l.44-.21-.27.41c-.17.25-.4.63-.67,1.09a25.29,25.29,0,0,0-1.73,3.62,26.43,26.43,0,0,0-1.17,3.84c-.11.52-.19,1-.23,1.26Z"/>
                        <path class="cls-113" d="M453.14,383.49l-2.23-.94c-1.35-.58-3.21-1.32-5.26-2.12s-3.92-1.51-5.3-2l-2.27-.82a17.33,17.33,0,0,1,2.44,0,19.05,19.05,0,0,1,10.82,4.23A15.48,15.48,0,0,1,453.14,383.49Z"/>
                        <path class="cls-113" d="M451,383.53l-1.94-.9c-1.19-.55-2.81-1.26-4.59-2s-3.4-1.46-4.62-2l-2-.8a12.85,12.85,0,0,1,2.17,0,15.4,15.4,0,0,1,9.49,4.1A12.62,12.62,0,0,1,451,383.53Z"/>
                        <path class="cls-113" d="M433.56,380.16l.49-.24a9.86,9.86,0,0,1,1.41-.54,11.85,11.85,0,0,1,9.63,1.16,10.92,10.92,0,0,1,1.24.85l.42.36-.53-.12c-.34-.09-.83-.19-1.43-.31-1.2-.26-2.81-.52-4.59-.73s-3.41-.34-4.63-.39l-1.46,0Z"/>
                        <path class="cls-119" d="M458.65,398.82s-.24-.74-.64-1.93-.92-2.74-1.52-4.5-1.14-3.33-1.53-4.48l-.67-1.92a11.9,11.9,0,0,1,1.4,1.51,15,15,0,0,1,2.38,4.36,14.81,14.81,0,0,1,.77,4.9A11.51,11.51,0,0,1,458.65,398.82Z"/>
                        <path class="cls-119" d="M453.17,385.37a11.36,11.36,0,0,1,1.5,1.56,14.65,14.65,0,0,1,2.51,4.56,14.45,14.45,0,0,1,.69,5.15,11.27,11.27,0,0,1-.27,2.14s-.21-.8-.55-2-.86-2.91-1.46-4.72-1.18-3.46-1.64-4.66Z"/>
                        <path class="cls-119" d="M458,397.07a12.84,12.84,0,0,1-.61-1.35c-.33-.83-.71-2-1.06-3.2s-.61-2.34-.88-3.17S455,388,455,388a5.11,5.11,0,0,1,1.19.95,7.5,7.5,0,0,1,1.77,3.15,9.87,9.87,0,0,1,.28,3.53A10.46,10.46,0,0,1,458,397.07Z"/>
                        <path class="cls-119" d="M451,385.21l.53.26a11.76,11.76,0,0,1,1.38.87,12.88,12.88,0,0,1,3.58,4,12.75,12.75,0,0,1,1.57,5.14,10.3,10.3,0,0,1,0,1.63c0,.38-.05.59-.05.59s-.07-.2-.21-.55-.33-.86-.58-1.47a41.72,41.72,0,0,0-2.22-4.52,42.37,42.37,0,0,0-2.71-4.25c-.39-.53-.71-1-.95-1.26Z"/>
                        <path class="cls-119" d="M454.09,388.63a3.9,3.9,0,0,1,.88.56,5,5,0,0,1,1.48,1.89,5.11,5.11,0,0,1,.41,2.36,4.45,4.45,0,0,1-.17,1,9.86,9.86,0,0,1-.63-.8,11.33,11.33,0,0,1-1.13-1.92,11.14,11.14,0,0,1-.66-2.12C454.14,389,454.09,388.63,454.09,388.63Z"/>
                        <path class="cls-113" d="M408.3,385.06a9.23,9.23,0,0,1,.57-.78,15.11,15.11,0,0,1,1.8-1.91,16.69,16.69,0,0,1,16.48-3.46,14.74,14.74,0,0,1,2.42,1c.55.29.83.48.83.48l-.95,0c-.61,0-1.48.05-2.52.12a56.07,56.07,0,0,0-7.8,1.11,57.14,57.14,0,0,0-7.59,2.12c-1,.36-1.8.67-2.36.91Z"/>
                        <path class="cls-113" d="M427.62,382.61l-.79-.24a17.77,17.77,0,0,0-8.42-.4,18.26,18.26,0,0,0-5.92,2.24,16.43,16.43,0,0,0-1.76,1.21l-.65.51a6.45,6.45,0,0,1,.22-.81,8.43,8.43,0,0,1,1-2.09,10,10,0,0,1,6.47-4.33,10.15,10.15,0,0,1,4.42.17,10,10,0,0,1,3.19,1.49,8.94,8.94,0,0,1,1.72,1.57C427.46,382.36,427.62,382.61,427.62,382.61Z"/>
                        <path class="cls-115" d="M459.58,405.43c-2,16-16.28,28.1-33.12,27.43a32.38,32.38,0,0,1-24.34-12.38c-.74-6.27.78-12.66,6.3-16.2-4.21-9.78,1.62-21.73,13.75-18a17.4,17.4,0,0,1,6.76,4.47c3.18-4.84,9.65-9.12,15.69-6.74,0,0,8.55,3,6.16,13.12C450.78,397.13,459.35,397.58,459.58,405.43Z"/>
                        <path class="cls-120" d="M443,429.34l1-.61.52-.34c.19-.12.39-.27.61-.43.43-.31.94-.65,1.45-1.08l.82-.66c.29-.23.56-.5.86-.76.6-.52,1.18-1.12,1.81-1.76.31-.31.61-.66.92-1l.47-.53.45-.56.46-.58.45-.59.88-1.24.81-1.29c.14-.21.26-.43.38-.65l.36-.64.35-.63.31-.63c.2-.42.41-.83.58-1.24.35-.82.69-1.59.94-2.34.13-.38.27-.73.37-1.09l.3-1c.21-.64.33-1.23.45-1.75.06-.26.12-.5.16-.72l.11-.62.2-1.14-.31,1.11-.16.6c-.07.22-.15.45-.23.71-.16.5-.33,1.08-.57,1.7l-.37,1c-.12.34-.28.68-.43,1-.29.73-.66,1.47-1,2.26-.19.4-.41.79-.62,1.2l-.32.61-.36.61-.36.62a6.58,6.58,0,0,1-.38.63l-.8,1.26-.86,1.22c-.14.21-.29.4-.44.59l-.43.57-.43.57-.45.53c-.29.35-.57.7-.86,1-.6.64-1.14,1.27-1.71,1.81-.27.28-.53.55-.8.8l-.76.71c-.48.46-.95.83-1.36,1.18-.2.17-.38.33-.56.47l-.49.38Z"/>
                        <path class="cls-116" d="M402.12,420.48c-.74-6.27.78-12.66,6.3-16.2-4.21-9.78,1.62-21.73,13.75-18a17.4,17.4,0,0,1,6.76,4.47c3.18-4.84,9.65-9.12,15.69-6.74a10.68,10.68,0,0,1,3.51,2.28,14.49,14.49,0,0,0-18.22,8.5,12.15,12.15,0,0,0-10.49-6.12,10,10,0,0,0-9.35,7.29c-1,4.13,1.6,8.91,5.71,10a10,10,0,0,0-10.16,9.41,11.94,11.94,0,0,0,3.45,8.3,21.43,21.43,0,0,0,7.7,4.94,36.57,36.57,0,0,0,28.53-.8,32.75,32.75,0,0,1-43.18-7.33Z"/>
                        <path class="cls-116" d="M434.29,405.46a1.86,1.86,0,0,1,.66,2,2.47,2.47,0,0,1-1.31,1.17,8.77,8.77,0,0,1-5.12.75,3.31,3.31,0,0,1-1.62-.62,1.51,1.51,0,0,1-.54-1.57,2.19,2.19,0,0,1,1.25-1.11,19.47,19.47,0,0,1,3.56-1.31,3,3,0,0,1,.88-.19,6.23,6.23,0,0,1,.62.15A3.8,3.8,0,0,1,434.29,405.46Z"/>
                        <path class="cls-116" d="M441.42,414.32l1.31-.4a16.55,16.55,0,0,1-2.69,9.87c-3.21,5-13.21,7.84-18.3-.68S441.42,414.32,441.42,414.32Z"/>
                        <path class="cls-95" d="M426.45,433.07A32.59,32.59,0,0,1,402,420.6l0,0v-.06c-.5-4.24-.34-12,6.25-16.3-2.29-5.46-1.55-11.65,1.86-15.44,2.92-3.25,7.25-4.2,12.21-2.68a17.33,17.33,0,0,1,6.66,4.34c3.44-5.06,9.91-8.93,15.8-6.61.08,0,8.57,3.11,6.35,13.13,1.42.16,8.54,1.3,8.75,8.48v0a31.1,31.1,0,0,1-11.06,20.1,32.63,32.63,0,0,1-21,7.54C427.34,433.1,426.89,433.09,426.45,433.07ZM455,398.53a12.13,12.13,0,0,0-4.24-1.19h-.26l.06-.25c1-4.13.26-7.55-2.12-10.16a10.7,10.7,0,0,0-3.91-2.72c-5.77-2.27-12.13,1.64-15.44,6.67l-.14.21-.18-.18a17.47,17.47,0,0,0-6.67-4.42c-4.79-1.47-9-.56-11.78,2.56-3.33,3.71-4,9.8-1.72,15.16l.07.16-.15.1c-6.51,4.17-6.69,11.75-6.21,15.93a32.15,32.15,0,0,0,24.14,12.26c16.5.65,30.94-11.3,32.91-27.23A7.52,7.52,0,0,0,455,398.53Z"/>
                        <path class="cls-121" d="M419.63,413.59s12.4-3.86,23.1.33c0,0-1,14.37-12.23,14C430.5,427.89,418.52,427.34,419.63,413.59Z"/>
                        <path class="cls-122" d="M429.18,423.3l-7.86-.83a12.48,12.48,0,0,1-1.61-4.74,7.88,7.88,0,0,1,6-3.27c6.84-.57,7.26,6.28,7.26,6.28Z"/>
                        <path class="cls-123" d="M419.73,417.86c2.5-.57,6.54-1,8.76,1.19a5.39,5.39,0,0,1,1,1.4,7.07,7.07,0,0,1,5.14.34c2.67,1.28,3.05,3.27,2.81,4.85a9.92,9.92,0,0,1-7,2.25S421.14,427.46,419.73,417.86Z"/>
                        <path class="cls-124" d="M428.49,419.05a5.39,5.39,0,0,1,1,1.4,5.75,5.75,0,0,1,.54,4.84s-.71-5.92-5.11-5.87c-2.36,0-3.5,1.34-3.72,2.88a12.4,12.4,0,0,1-1.49-4.44C422.23,417.29,426.27,416.83,428.49,419.05Z"/>
                        <path class="cls-125" d="M434.65,420.79c2.67,1.28,3.05,3.27,2.81,4.85-.2.17-.4.32-.61.47a5.49,5.49,0,0,0-1-3.83c-1.18-1.59-3.42-2-4.66-2.13A6.67,6.67,0,0,1,434.65,420.79Z"/>
                        <path class="cls-125" d="M430.43,425a12,12,0,0,0-.17-2.17,12.92,12.92,0,0,0-.53-2.11,2.72,2.72,0,0,1,.48.49,3.47,3.47,0,0,1,.66,1.52,3.4,3.4,0,0,1-.14,1.65A2.6,2.6,0,0,1,430.43,425Z"/>
                        <path class="cls-125" d="M421.34,422.38a2.38,2.38,0,0,1,.06-.69,2.79,2.79,0,0,1,2.37-2.17,2.23,2.23,0,0,1,.69,0,6.45,6.45,0,0,0-1.8,1.16A6.55,6.55,0,0,0,421.34,422.38Z"/>
                        <path class="cls-96" d="M434.73,406.46c.11,1.3-1.57,2.5-3.76,2.7s-4.06-.71-4.18-2,1.58-2.5,3.77-2.69S434.61,405.16,434.73,406.46Z"/>
                        <path class="cls-126" d="M418.36,396.88c3.28.25,5.69,3.66,5.39,7.61s-3.21,7-6.49,6.71-5.69-3.66-5.39-7.62,3.21-6.95,6.49-6.7Z"/>
                        <path class="cls-127" d="M418.33,399.1c2.77.21,4.81,3.08,4.55,6.42s-2.7,5.87-5.47,5.66-4.81-3.09-4.55-6.43,2.7-5.87,5.47-5.65Z"/>
                        <path class="cls-128" d="M418,402a3.36,3.36,0,1,1-3,3.09,3.08,3.08,0,0,1,3-3.09Z"/>
                        <path class="cls-127" d="M419.51,402.13a1.48,1.48,0,1,1-1.32,1.36,1.35,1.35,0,0,1,1.32-1.36Z"/>
                        <path class="cls-129" d="M416.53,403.68a.67.67,0,0,1,.55.76.61.61,0,1,1-.55-.76Z"/>
                        <path class="cls-130" d="M415.51,404.4s.3,2.55,1.83,2.89,2.82-1.65,2.82-1.65a4.48,4.48,0,0,1-.49,1.42,2.21,2.21,0,0,1-3.88.1,3.54,3.54,0,0,1-.28-2.76Z"/>
                        <path class="cls-131" d="M415.78,406.33a1.82,1.82,0,0,0,1.29,1.45c1.19.41,2.47-1.15,2.47-1.15s-1.53,1.11-2.45.66a3,3,0,0,1-1.32-1.46v.5Z"/>
                        <path class="cls-126" d="M443.78,395.72c3.05.23,5.29,3.4,5,7.07s-3,6.47-6,6.24-5.29-3.4-5-7.08,3-6.46,6-6.23Z"/>
                        <path class="cls-127" d="M443.76,397.78c2.57.2,4.46,2.87,4.23,6s-2.52,5.46-5.09,5.26-4.47-2.87-4.23-6,2.51-5.46,5.09-5.26Z"/>
                        <path class="cls-128" d="M443.42,400.49a3.12,3.12,0,1,1-2.8,2.87,2.86,2.86,0,0,1,2.8-2.87Z"/>
                        <path class="cls-127" d="M444.85,400.6a1.38,1.38,0,1,1-1.23,1.26,1.27,1.27,0,0,1,1.23-1.26Z"/>
                        <path class="cls-129" d="M442.1,402.09a.57.57,0,0,1,.47.66.56.56,0,0,1-.57.58.63.63,0,0,1,.1-1.24Z"/>
                        <path class="cls-130" d="M441.14,402.71s.27,2.37,1.7,2.69,2.62-1.54,2.62-1.54a4.36,4.36,0,0,1-.45,1.32,2.06,2.06,0,0,1-3.62.1,3.34,3.34,0,0,1-.25-2.57Z"/>
                        <path class="cls-131" d="M441.38,404.5a1.73,1.73,0,0,0,1.21,1.36c1.1.37,2.29-1.08,2.29-1.08s-1.42,1-2.28.62a2.88,2.88,0,0,1-1.23-1.36v.46Z"/>
                        <path class="cls-96" d="M423.49,396.24a4.56,4.56,0,0,0-1.95-3.26,6.4,6.4,0,0,0-3.79-1.08,7,7,0,0,0-3.8,1,4.1,4.1,0,0,0-1.38,1.46,3,3,0,0,0-.41,1.87,4.15,4.15,0,0,1,2.3-2.41,8.34,8.34,0,0,1,3.29-.55,7.1,7.1,0,0,1,3.25.63A5.89,5.89,0,0,1,423.49,396.24Z"/>
                        <path class="cls-96" d="M447.78,393.59a4.18,4.18,0,0,0-2.12-2.84,5.92,5.92,0,0,0-3.63-.6,6.44,6.44,0,0,0-3.41,1.3,3.88,3.88,0,0,0-1.13,1.51,3,3,0,0,0-.16,1.78,3.87,3.87,0,0,1,1.89-2.43,7.92,7.92,0,0,1,3-.84,6.59,6.59,0,0,1,3,.23A5.53,5.53,0,0,1,447.78,393.59Z"/>
                        <path class="cls-132" d="M389.47,381.55c-.66-6,14-9.68,14-9.68l41-5.23s10.26.06,11.93,6c1.85,6.61-12.87,12.7-33.76,15.09S390.21,388.23,389.47,381.55Z"/>
                        <path class="cls-133" d="M389.47,380.71c1.81,5.83,13.06,7.51,32.82,5.26,19.38-2.21,33.48-7.78,33.94-13.83,0,.1.13.36.16.46,1.85,6.61-12.93,13-33.83,15.34s-32.47.2-33.21-6.48A3.9,3.9,0,0,1,389.47,380.71Z"/>
                        <path class="cls-134" d="M445,367.43c1.41,0,3,.95,4.32,1.43a5.22,5.22,0,0,1,3.33,3c1.35,4.15-3.89,5.68-6.77,7a56,56,0,0,1-5.77,2.11c-1.86.64-4.33,1.3-6-.17-2-1.83-.41-3.26,1.45-4.27s3.66-1.83,5.4-2.89a3.63,3.63,0,0,0,1.72-3.86c-.13-1.28.22-2.55,1.82-2.55Z"/>
                        <path class="cls-133" d="M444.1,359.62l2.63,13.07s-5.49,6.36-22.91,8.85c-19.27,2.76-24.28-2.36-24.28-2.36L399,365.4Z"/>
                        <path class="cls-132" d="M420.84,357.27c11.6-1.71,22.86-.63,23.26,2.35s-8.53,7.35-20.85,9.16-24.32.79-24.26-3.38C399,361.5,409.8,358.89,420.84,357.27Z"/>
                        <path class="cls-135" d="M445.76,367.62s-7.66,6.82-22.35,8.21c-24.27,2.3-24-2.25-24-2.25l.17,5.6s3.62,5.44,24.28,2.36c22.84-3.4,22.91-8.85,22.91-8.85Z"/>
                        <path class="cls-136" d="M440.18,371.21a5.31,5.31,0,0,1,1,2.85c.08,1.51.15,3.08.15,3.08s.12.16-2,.88-4.42,1.31-4.42,1.31a14.7,14.7,0,0,0,.11-2.8,6.33,6.33,0,0,0-.65-3l2.28-.89C439.18,371.63,440.18,371.21,440.18,371.21Z"/>
                        <path class="cls-134" d="M422.94,357.88c.82-.59,2.63-.58,3.63-.66a45,45,0,0,1,7,.06c2,.14,4.58.16,6.41,1.27,1.47.9,3.52,2.24-.43,4.77-1.8.83-5.27,2-6.83,1.59-3.26-.8,4.38-2.76,3.18-4.83-2.48-1.89-6.29-1.43-10.19-1.16C424.52,359,421.33,359,422.94,357.88Z"/>
                        <rect class="cls-137" x="154.08" y="479.98" width="479.13" height="11.48"/>
                        <polygon class="cls-137" points="190.64 491.46 286.81 583.99 286.81 572.33 211.04 491.46 190.64 491.46"/>
                        <polygon class="cls-56" points="286.81 572.33 211.04 491.46 222.33 491.46 286.81 565.05 286.81 572.33"/>
                        <polygon class="cls-137" points="248.93 531.9 254.03 491.46 266.05 491.46 255.44 538.86 248.93 531.9"/>
                        <polygon class="cls-56" points="255.44 538.86 266.05 491.46 273.33 491.46 260.95 537.73 255.44 538.86"/>
                        <polygon class="cls-137" points="305.39 491.46 354.93 594.55 361.49 594.55 318.62 491.46 305.39 491.46"/>
                        <polygon class="cls-56" points="318.62 491.46 327.61 491.46 361.49 583.99 361.49 594.55 318.62 491.46"/>
                        <polygon class="cls-56" points="388.44 601.11 455.11 491.46 468.95 491.46 396.82 601.11 388.44 601.11"/>
                        <polygon class="cls-137" points="388.44 601.11 455.11 491.46 444.18 491.46 388.44 592.73 388.44 601.11"/>
                        <polygon class="cls-137" points="426.29 538.86 493.72 491.46 511.2 491.46 420.44 548.48 426.29 538.86"/>
                        <polygon class="cls-56" points="420.44 548.48 511.2 491.46 524.68 491.46 431.44 548.48 420.44 548.48"/>
                        <polygon class="cls-56" points="397.75 479.98 396.45 445.59 400.99 445.59 400.99 479.98 397.75 479.98"/>
                        <polygon class="cls-137" points="400.99 479.98 400.99 445.59 403.9 445.59 403.04 479.98 400.99 479.98"/>
                        <polygon class="cls-56" points="411.76 479.98 411.06 445.59 415.09 445.59 414.74 479.98 411.76 479.98"/>
                        <polygon class="cls-137" points="414.74 479.98 415.09 445.59 417.64 445.59 416.83 479.98 414.74 479.98"/>
                        <polygon class="cls-56" points="425.01 479.98 424.58 445.59 428.67 445.59 428.67 479.98 425.01 479.98"/>
                        <polygon class="cls-137" points="428.67 479.98 428.67 445.59 431.59 445.59 430.72 479.98 428.67 479.98"/>
                        <polygon class="cls-137" points="439.01 440.48 395.39 440.48 395.3 445.76 439.01 445.59 439.01 440.48"/>
                        <polygon class="cls-56" points="395.39 440.48 388.43 440.48 388.43 445.59 395.3 445.76 395.39 440.48"/>
                        <polygon class="cls-56" points="514.89 479.98 513.6 445.59 518.13 445.59 518.13 479.98 514.89 479.98"/>
                        <polygon class="cls-137" points="518.13 479.98 518.13 445.59 521.04 445.59 520.18 479.98 518.13 479.98"/>
                        <polygon class="cls-56" points="528.9 479.98 528.2 445.59 532.23 445.59 531.88 479.98 528.9 479.98"/>
                        <polygon class="cls-137" points="531.88 479.98 532.23 445.59 534.78 445.59 533.97 479.98 531.88 479.98"/>
                        <polygon class="cls-56" points="540.7 479.98 540.26 445.59 544.36 445.59 544.36 479.98 540.7 479.98"/>
                        <polygon class="cls-137" points="544.36 479.98 544.36 445.59 547.27 445.59 546.41 479.98 544.36 479.98"/>
                        <polygon class="cls-137" points="554.71 440.48 510.79 440.48 511.13 445.59 554.71 445.59 554.71 440.48"/>
                        <rect class="cls-56" x="505.72" y="440.48" width="5.89" height="5.11"/>
                        <polygon class="cls-138" points="289.59 623.82 283.03 623.82 280.12 452.98 288.13 452.98 289.59 623.82"/>
                        <polygon class="cls-139" points="286.68 623.82 280.12 623.82 277.2 452.98 285.22 452.98 286.68 623.82"/>
                        <polygon class="cls-138" points="351.03 623.82 344.47 623.82 345.93 452.98 353.94 452.98 351.03 623.82"/>
                        <polygon class="cls-139" points="348.12 623.82 341.56 623.82 343.02 452.98 351.03 452.98 348.12 623.82"/>
                        <polygon class="cls-138" points="342.81 477.5 288.32 475.62 285.39 472.66 342.84 474.11 342.81 477.5"/>
                        <polygon class="cls-139" points="343.68 474.11 284.85 472.65 284.85 467.73 343.68 466.27 343.68 474.11"/>
                        <polygon class="cls-138" points="342.59 510.08 288.32 508.95 285.67 506 342.84 507.44 342.59 510.08"/>
                        <polygon class="cls-139" points="342.84 507.44 285.39 505.99 285.39 500.61 342.84 500.97 342.84 507.44"/>
                        <polygon class="cls-138" points="342.28 542.89 288.32 542.28 285.96 539.77 342.28 539.77 342.28 542.89"/>
                        <polygon class="cls-139" points="342.28 539.77 285.96 539.77 285.67 532.94 342.28 534.03 342.28 539.77"/>
                        <polygon class="cls-138" points="341.99 576.83 289.18 576.16 286.24 572.66 341.99 573.37 341.99 576.83"/>
                        <polygon class="cls-139" points="341.99 573.84 285.96 572.65 285.96 567.3 342.12 568.79 341.99 573.84"/>
                        <polygon class="cls-138" points="341.77 610.48 289.5 608.57 286.45 605.65 341.77 606.84 341.77 610.48"/>
                        <polygon class="cls-139" points="341.77 606.84 286.45 605.65 286.48 600.33 341.77 599.92 341.77 606.84"/>
                        <path class="cls-140" d="M447,751.85a2.18,2.18,0,0,1-2.12-1.66c-8.7-35.39-5.51-202.13-4.46-256.92.14-7.5.24-12.92.26-15.37a2.19,2.19,0,0,1,4.38,0c0,2.47-.13,7.9-.27,15.41-1,54.65-4.23,221,4.33,255.79a2.19,2.19,0,0,1-1.6,2.65A2.31,2.31,0,0,1,447,751.85Z"/>
                        <path class="cls-140" d="M515.23,750.64a2.19,2.19,0,0,1-2.11-1.62c-8.61-32-7.15-199.06-6.67-254,.06-7.05.11-12.15.11-14.55a2.19,2.19,0,0,1,4.37,0c0,2.42-.05,7.52-.11,14.59-.48,54.75-1.93,221.36,6.52,252.78a2.19,2.19,0,0,1-1.54,2.68A2.24,2.24,0,0,1,515.23,750.64Z"/>
                        <polygon class="cls-139" points="436.14 505.16 517.27 503.3 517.27 519.08 436.14 519.08 436.14 505.16"/>
                        <path class="cls-139" d="M516.87,561.21s-49.44-.21-72.63-1.15a99.6,99.6,0,0,1-11.12-.81.65.65,0,0,1-.16,0c.06-.64.11-1.31.16-2,.33-4.7.3-10,.29-11.09v-.21l3.31.13h.06c6.33.24,20.82.75,36.54.91,15.24.17,31.66,0,42.95-1C516.73,557.57,516.87,561.21,516.87,561.21Z"/>
                        <polygon class="cls-139" points="434.28 639.74 519.5 637.83 519.5 653.98 434.28 653.98 434.28 639.74"/>
                        <path class="cls-139" d="M432.07,690.53s56.49,2.68,87.17,0c.52,12.53.68,16.45.68,16.45s-80.59-.37-88.37-2.16C432.18,698.75,432.07,690.53,432.07,690.53Z"/>
                        <path class="cls-139" d="M433.12,587.75c9.79,1,76.47,1,83.17,0a139.67,139.67,0,0,1,0,14.51l-83.17,0Z"/>
                        <path class="cls-140" d="M447,710.57h-6.17a2.19,2.19,0,1,1,0-4.37H447a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M445.27,690.17h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M513.29,711.3h-6.18a2.19,2.19,0,0,1,0-4.38h6.18a2.19,2.19,0,0,1,0,4.38Z"/>
                        <path class="cls-140" d="M513.11,691h-6.17a2.19,2.19,0,0,1,0-4.37h6.17a2.19,2.19,0,1,1,0,4.37Z"/>
                        <path class="cls-141" d="M444.58,658.35h-6.17a2.19,2.19,0,0,1,0-4.37h6.17a2.19,2.19,0,1,1,0,4.37Z"/>
                        <path class="cls-140" d="M445.27,639.41h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M445.27,606.75h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M444.58,588.29h-6.17a2.19,2.19,0,0,1,0-4.37h6.17a2.19,2.19,0,1,1,0,4.37Z"/>
                        <path class="cls-140" d="M445.27,564.37h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M445.27,545.49h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M446.72,522.85h-6.17a2.19,2.19,0,1,1,0-4.38h6.17a2.19,2.19,0,1,1,0,4.38Z"/>
                        <path class="cls-140" d="M511.33,606.75h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M511.33,587.69h-6.18a2.19,2.19,0,0,1,0-4.38h6.18a2.19,2.19,0,0,1,0,4.38Z"/>
                        <path class="cls-140" d="M511.33,565.83h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M511.33,545.49h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M511.13,523.45H505a2.19,2.19,0,1,1,0-4.37h6.17a2.19,2.19,0,1,1,0,4.37Z"/>
                        <path class="cls-141" d="M511.66,658.35h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M511.33,637.83h-6.18a2.19,2.19,0,0,1,0-4.37h6.18a2.19,2.19,0,0,1,0,4.37Z"/>
                        <path class="cls-140" d="M511.13,503.66H505a2.19,2.19,0,1,1,0-4.37h6.17a2.19,2.19,0,1,1,0,4.37Z"/>
                        <path class="cls-140" d="M445.41,505h-6.17a2.19,2.19,0,0,1,0-4.37h6.17a2.19,2.19,0,1,1,0,4.37Z"/>
                        <polygon class="cls-138" points="436.14 515.16 436.14 505.16 517.27 503.3 439.09 508.45 437.72 511.57 469.9 512.77 441.4 514.79 438.54 517.12 453.26 519.08 436.14 519.08 436.14 515.16"/>
                        <polygon class="cls-138" points="432.75 597.36 432.75 587.36 512.54 588.02 435.71 590.66 435.87 593.83 466.51 594.97 438.01 596.99 437.19 599.69 451.81 602.3 433.12 602.31 432.75 597.36"/>
                        <polygon class="cls-138" points="434.28 649.55 434.28 639.55 519.5 637.83 437.24 642.84 437.4 646.01 489.87 645.36 439.54 649.17 438.72 651.87 468.38 653.98 434.28 653.98 434.28 649.55"/>
                        <polygon class="cls-138" points="432.07 690.53 503.34 691.42 436.09 694.29 436.25 697.47 488.72 696.82 438.39 700.63 437.57 703.32 462.37 706.28 431.55 704.83 432.07 690.53"/>
                        <path class="cls-138" d="M438.38,555.77l-2.86,2.33,14.73,2L433,559.22l.16-13.09h.29l3.31-.08h.06c6.33.24,20.82.75,36.54.91l-37.24,2.47-1.37,3.12,32.17,1.19Z"/>
                        <polygon class="cls-138" points="239.29 638.15 209.15 638.15 199.96 590.27 245.58 588.82 239.29 638.15"/>
                        <polygon class="cls-142" points="199.96 590.27 245.58 588.82 239.29 638.15 233.42 638.15 235.37 598.42 205.9 591.64 200.24 591.85 199.96 590.27"/>
                        <polygon class="cls-142" points="222.77 595.52 228.58 596.86 228.58 638.15 225.68 638.15 222.77 595.52"/>
                        <polygon class="cls-143" points="206.95 595.52 217.88 598.42 219.58 633.85 213.27 633.85 206.95 595.52"/>
                        <polygon class="cls-144" points="199.96 590.27 197.24 590.27 197.24 587.46 248.48 586.49 247.69 590.27 199.96 590.27"/>
                        <polygon class="cls-145" points="198.88 588.2 235.4 587.22 234.85 588.2 198.88 589.46 198.88 588.2"/>
                        <path class="cls-146" d="M202.56,587.22h-1.41c0-12.48,9.45-27,21.62-27,12.37,0,21.61,13.91,21.61,26.35H243c0-11.54-8.83-25-20.21-25S202.56,575.39,202.56,587.22Z"/>
                        <path class="cls-147" d="M200.36,587.41l-.14-1a1.61,1.61,0,0,1,1.59-1.84h.25a1.61,1.61,0,0,1,1.61,1.61v1.19Z"/>
                        <path class="cls-148" d="M241.81,586.63l-.19-1.43a1.39,1.39,0,0,1,1.37-1.56h.93a1.38,1.38,0,0,1,1.37,1.53l-.16,1.46Z"/>
                        <path class="cls-141" d="M224,562.45a1.47,1.47,0,0,1-1.46-1.42l-.15-4.73c-.82-26.16-2.35-13-1.87-38.1,0-.11.27-11,2.39-14.51s7.95-3.59,11.24-2.37a1.46,1.46,0,0,1-1,2.73c-2.54-.94-6.68-.6-7.71,1.13-1.22,2.05-1.91,9-2,13.08-.49,25,1,11.82,1.87,38l.15,4.73a1.47,1.47,0,0,1-1.42,1.51Z"/>
                        <path class="cls-141" d="M228,528.43a1.47,1.47,0,0,1-1.37-1.95A21.6,21.6,0,0,1,241.8,513a1.46,1.46,0,1,1,.64,2.84,18.62,18.62,0,0,0-13.12,11.65A1.45,1.45,0,0,1,228,528.43Z"/>
                        <path class="cls-141" d="M223.83,526.25l-.26,0a1.45,1.45,0,0,1-1.17-1.69c1.36-7.45,8.32-14.86,15.51-16.51a1.46,1.46,0,1,1,.66,2.84c-6.06,1.39-12.15,7.89-13.31,14.19A1.46,1.46,0,0,1,223.83,526.25Z"/>
                        <path class="cls-141" d="M231.78,532.68a1.45,1.45,0,0,1-1.45-1.38,39.09,39.09,0,0,1,6.35-23.47,1.46,1.46,0,1,1,2.44,1.6,36.15,36.15,0,0,0-5.88,21.71,1.46,1.46,0,0,1-1.38,1.53Z"/>
                        <path class="cls-38" d="M219.1,261.53c-10.81,31-11.85,35-11.47,65.77,0,1,0,2.1.05,3.2l-9.13-5.21c0-8.64-.14-22.84,4.77-37.41,1.37-4.05,3.53-8.86,4.09-11.68s-3.81-12.51-4.7-9.8c-1.42,4.3-4.36,12.92-7.59,20.75-2.07,5-9.21,3.76-13.47.36a49,49,0,0,1-10.75-12.38c-2.87-4.62-6-8.16-11.48-8.19,4.63,12,11.42,20.45,16.53,32.27,2.09,4.81,3.63,15.27,3.63,15.27-6.79-19.36-18.25-38.64-29-54-3.41-4.9-6.73-9.4-9.79-13.38,3.79-5.36,5.54-9.57,7.5-16.16,10,15.07,19,28.3,28.62,43.64a46.12,46.12,0,0,0,6.38,7.48c2.7,2.29,4.88,2.53,9.4,2l.86-.1.48-1.33c.1-.3.22-.59.34-.9,4.27-11.79,8-21.05,11.58-30.38,3-7.78,5.78-15.58,8.61-24.9,3.82-2.08,11.09-4.88,21.61-17.47C235.81,210.29,222.48,251.81,219.1,261.53Z"/>
                        <path class="cls-37" d="M216.21,379.37c-1.37,1.12-3,3.68-4.25,4a.8.8,0,0,1-.87-.27c-1.59-1.77-4.55,0-6.72-5.07-.07-.16-.13-.34-.21-.51-5.59-14.62-5.61-51.82-5.61-52.2l9.13,5.21c.1,7.19.61,16.23,1.48,24.58a142.57,142.57,0,0,0,2.35,15.72c.22,1,.44,1.91.67,2.75.07.28.16.56.25.83.17.62.36,1.18.55,1.69.12.3.22.56.33.81s.12.26.18.37a3.91,3.91,0,0,0,.2.41,5.15,5.15,0,0,0,.27.48,4.17,4.17,0,0,0,.55.73,1.9,1.9,0,0,0,.29.28l.31.2a.59.59,0,0,0,.24.09A1.18,1.18,0,0,0,216.21,379.37Z"/>
                        <path class="cls-37" d="M228.63,369.68c-7.49,4.83-8.67,9.53-8.92,13.71s-2.48,11.55-5.71,8.78A35.15,35.15,0,0,1,204.37,378c-.07-.16-.13-.34-.21-.51l5.77-5.26,1.58-1.43c.22,1,.44,1.91.67,2.75.09.29.16.56.25.83.17.62.36,1.18.55,1.69.12.3.22.56.33.81s.12.26.18.37a3.91,3.91,0,0,0,.2.41,5.15,5.15,0,0,0,.27.48l.27.4a2.31,2.31,0,0,0,.28.33,1.9,1.9,0,0,0,.29.28l.31.2a.59.59,0,0,0,.24.09,1.18,1.18,0,0,0,.86-.07,2.24,2.24,0,0,0,.7-.54c1.34-1.43,2.61-2.64,3.76-3.67C225.54,370.81,228.63,369.68,228.63,369.68Z"/>
                        <path class="cls-149" d="M243.8,388.47l-.43-2.17s5.55-4.39,9.95-6.18C247.35,385.22,243.8,388.47,243.8,388.47Z"/>
                        <path class="cls-38" d="M282.73,280.46c-3.36,19.54-5,35.82-6.58,53.49-.17,2-.36,4-.53,6.09-1.29,14.53-.78,20.35-6.05,26.2-3.78,4.17-11.22,9.74-18.54,15.87-2.66,2.24-5.59,4.79-8,7.12l-.15-2.4-.65-3.32a84.66,84.66,0,0,1,9.71-8.33c5.75-4.26,12.27-8.06,15.74-14.33,2.36-4.3,3-9.31,3.62-14.18.67-5.31,1.33-10.65,2-16,.33-2.62.44-5.79-1.73-7.32-1.74-1.23-4.24-.69-5.88.65a14.82,14.82,0,0,0-3.52,5.23l-.12.06c1.17-6.69,2.24-13.48,3.24-20.28,1.66-11.24,3.1-22.5,4.31-33.38C275.18,278.26,277.73,279.31,282.73,280.46Z"/>
                        <path class="cls-38" d="M193.6,284a4.64,4.64,0,0,1-4.17,2.81c-2,.22-4.28-.82-7-3.28-7.4-6.7-14-16.9-19-25.54-1.72-3-2.59-5.25-6-5.66-3-.37-4.07,1.64-6.85,8.17-3.53-5.2-7.45-9.44-9.79-13.38,3.79-5.36,5.54-9.57,7.5-16.16,10,15.07,19,28.3,28.62,43.64a46.12,46.12,0,0,0,6.38,7.48C186,284.34,189.08,284.48,193.6,284Z"/>
                        <path class="cls-150" d="M219.1,261.53c-10.81,31-11.85,35-11.47,65.77-2.68-12.31-1.89-26.83-.25-38.7,2-14.27,6.24-22.93,11.18-36.16A17.3,17.3,0,0,1,206,251.36c3-7.78,5.78-15.58,8.61-24.9,3.82-2.08,11.09-4.88,21.61-17.47C235.81,210.29,222.48,251.81,219.1,261.53Z"/>
                        <path class="cls-151" d="M220.67,375.16a27.49,27.49,0,0,0-2.88,7,4.59,4.59,0,0,1-1.25,2.57c-1.26,1-3.18.24-4.26-1a4,4,0,0,1-.32-.4c-1.85-2.38-2-5.72-2-8.77,0-.75,0-1.54,0-2.34-.17-5.54-.74-11.94-.78-17.17a144.48,144.48,0,0,0,2.36,15.74c.22,1,.44,1.91.67,2.75.09.29.16.56.25.83.17.62.36,1.18.55,1.69.12.3.22.56.33.81s.12.26.18.37a3.91,3.91,0,0,0,.2.41,5.15,5.15,0,0,0,.27.48l.27.4a2.31,2.31,0,0,0,.28.33,1.9,1.9,0,0,0,.29.28l.31.2a.59.59,0,0,0,.24.09,1.18,1.18,0,0,0,.86-.07,2.24,2.24,0,0,0,.7-.54C218.25,377.4,219.52,376.19,220.67,375.16Z"/>
                        <path class="cls-38" d="M283.26,279.93c-3.36,19.54-5,35.82-6.58,53.49q-.58-15.46-1.16-30.91a24.84,24.84,0,0,0-9.74,6c1.67-11.24,3.11-22.5,4.32-33.38C275.71,277.73,278.26,278.78,283.26,279.93Z"/>
                        <path class="cls-139" d="M386.59,694.93,299.84,694s.32-4.84-1.06-7.94l7.92.31a97.86,97.86,0,0,1-8.65-4.76l-.16-.09a38,38,0,0,1-1.46-8c22.23.88,86.82.54,86.82.54Z"/>
                        <path class="cls-139" d="M386.59,728.28l-87.93-.95s-2.2-17.34-2.23-20.43c22.23.88,89.74.54,89.74.54Z"/>
                        <path class="cls-139" d="M381.52,763.08l-84.46-.92s-2.11-16.66-2.14-19.63c21.35.85,86.2.53,86.2.53Z"/>
                        <path class="cls-37" d="M388,696.39l-86.75-.95s.33-4.84-1.05-7.94l7.92.31c-2.36-1-7.68-4.17-8.66-4.76l-.16-.1a38.12,38.12,0,0,1-1.45-8c22.22.89,86.82.55,86.82.55Z"/>
                        <path class="cls-139" d="M386.59,694.93,299.84,694s.32-4.84-1.06-7.94l7.92.31a97.86,97.86,0,0,1-8.65-4.76l-.16-.09a38,38,0,0,1-1.46-8c22.23.88,86.82.54,86.82.54Z"/>
                        <path class="cls-138" d="M384.19,680c-7.8.81-23.08,1.86-31.47,2.12,10.13.28,31.21-.33,32,1.35Z"/>
                        <path class="cls-138" d="M383.56,675.86l-82.66,1.63-1.62,3.14,7.42,5.72-8.65-4.76-.16-.09a38,38,0,0,1-1.46-8c22.23.88,86.82.54,86.82.54Z"/>
                        <path class="cls-138" d="M372.49,690.21a2.47,2.47,0,0,1-1.56.82,11.18,11.18,0,0,1-2.1.14c-1.82,0-9.51-.14-10.19-.15-3.64,0-7.29-.22-10.91-.59-1.57-.15-3.13-.34-4.69-.55,7.24,0,14.49.21,21.72.18C366.1,690.05,370.63,690.26,372.49,690.21Z"/>
                        <path class="cls-138" d="M304.31,689.21c8.73-.39,17.54-.37,26.31.07a146.17,146.17,0,0,1-28.05,1.22c-.53-.21-.44-.74,0-1A4.08,4.08,0,0,1,304.31,689.21Z"/>
                        <path class="cls-138" d="M338.45,682.07a98.8,98.8,0,0,1-27.36-.63C320.21,681.88,329.33,682,338.45,682.07Z"/>
                        <path class="cls-152" d="M300.11,678.06a1.28,1.28,0,0,0,1.67-1,1.22,1.22,0,0,0-1.51-1.2C299.55,676.06,299.4,677.79,300.11,678.06Z"/>
                        <path class="cls-152" d="M302.32,691a1.77,1.77,0,0,0-1.2.11.88.88,0,0,0-.45,1c.2.52.9.58,1.45.5s1.19-.42,1.11-1S302.72,691,302.32,691Z"/>
                        <path class="cls-152" d="M380.56,676.8l-.24.13a1.12,1.12,0,1,0,.24-.13Z"/>
                        <path class="cls-152" d="M384.7,692.4c0-.81-.78-1.37-1.47-1.79a1.71,1.71,0,0,0-1.21,1.57,1.49,1.49,0,0,0,1.27,1.46A1.31,1.31,0,0,0,384.7,692.4Z"/>
                        <path class="cls-37" d="M388,729.74l-87.92-1s-2.2-17.34-2.23-20.44c22.22.89,89.73.55,89.73.55Z"/>
                        <path class="cls-139" d="M386.59,728.28l-87.93-.95s-2.2-17.34-2.23-20.43c22.23.88,89.74.54,89.74.54Z"/>
                        <path class="cls-138" d="M386.21,714.35c-7.81.82-26.56,1.87-34.95,2.12,10.13.28,34.31.26,35.13,1.93Z"/>
                        <path class="cls-138" d="M386.2,709.22l-84.42,3.21-1.75,3,7.19,2.15-9.56,1.54s-1.2-9.14-1.23-12.23c22.23.88,89.74.54,89.74.54Z"/>
                        <path class="cls-138" d="M372.49,723.56a2.47,2.47,0,0,1-1.56.82,11.18,11.18,0,0,1-2.1.14c-1.82,0-9.51-.14-10.19-.15-3.64,0-7.29-.22-10.91-.59-1.57-.15-3.13-.34-4.69-.55,7.24,0,14.49.21,21.72.18C366.1,723.4,370.63,723.61,372.49,723.56Z"/>
                        <path class="cls-138" d="M306.68,722.15c8.73-.39,17.54-.37,26.32.07a146.24,146.24,0,0,1-28.06,1.22c-.53-.21-.44-.74,0-1A4,4,0,0,1,306.68,722.15Z"/>
                        <path class="cls-138" d="M338.45,715.42a98.8,98.8,0,0,1-27.36-.63C320.21,715.23,329.33,715.32,338.45,715.42Z"/>
                        <path class="cls-152" d="M300.11,711.41a1.28,1.28,0,0,0,1.67-1,1.22,1.22,0,0,0-1.51-1.2C299.55,709.41,299.4,711.14,300.11,711.41Z"/>
                        <path class="cls-152" d="M301.92,724.1a1,1,0,0,0-.91.13,1.17,1.17,0,0,0-.35,1.14.84.84,0,0,0,1.11.55,1,1,0,0,0,.85-1.06A.87.87,0,0,0,301.92,724.1Z"/>
                        <path class="cls-152" d="M383.47,710.15l-.24.13a1.11,1.11,0,1,0,1.77.94A1.16,1.16,0,0,0,383.47,710.15Z"/>
                        <path class="cls-152" d="M384.7,725.75c0-.81-.78-1.37-1.47-1.79a1.71,1.71,0,0,0-1.21,1.57,1.49,1.49,0,0,0,1.27,1.46A1.31,1.31,0,0,0,384.7,725.75Z"/>
                        <path class="cls-37" d="M381.52,766l-84.46-.92s-2.11-16.65-2.14-19.62c21.35.84,86.2.52,86.2.52Z"/>
                        <path class="cls-139" d="M381.52,763.08l-84.46-.92s-2.11-16.66-2.14-19.63c21.35.85,86.2.53,86.2.53Z"/>
                        <path class="cls-138" d="M381.16,749.69c-7.5.79-25.51,1.79-33.57,2,9.73.27,33,.24,33.74,1.85Z"/>
                        <path class="cls-138" d="M381.15,744.76l-81.09,3.09-1.69,2.89,6.92,2.06-9.19,1.49s-1.15-8.79-1.18-11.76c21.35.85,86.2.53,86.2.53Z"/>
                        <path class="cls-138" d="M368,758.54a2.35,2.35,0,0,1-1.49.78,10.44,10.44,0,0,1-2,.14c-1.75,0-9.13-.14-9.78-.14-3.5,0-7-.22-10.49-.57-1.5-.15-3-.33-4.49-.53,6.95,0,13.91.2,20.86.17C361.84,758.39,366.2,758.59,368,758.54Z"/>
                        <path class="cls-138" d="M304.77,757.18c8.39-.37,16.84-.35,25.28.07a140.41,140.41,0,0,1-26.95,1.18c-.51-.2-.43-.71,0-.95A4.1,4.1,0,0,1,304.77,757.18Z"/>
                        <path class="cls-138" d="M335.28,750.72a95.2,95.2,0,0,1-26.27-.6C317.76,750.53,326.52,750.62,335.28,750.72Z"/>
                        <path class="cls-152" d="M298.45,746.87a1.23,1.23,0,0,0,1.61-1,1.18,1.18,0,0,0-1.45-1.16C297.91,744.94,297.78,746.6,298.45,746.87Z"/>
                        <path class="cls-152" d="M300.2,759.06a1,1,0,0,0-.88.12,1.12,1.12,0,0,0-.34,1.1.82.82,0,0,0,1.07.53,1,1,0,0,0,.82-1A.87.87,0,0,0,300.2,759.06Z"/>
                        <path class="cls-152" d="M378.53,745.65l-.23.13a1.12,1.12,0,0,0,.15,1.79,1.06,1.06,0,1,0,.08-1.92Z"/>
                        <path class="cls-152" d="M379.71,760.64c0-.77-.75-1.31-1.41-1.72a1.65,1.65,0,0,0-1.16,1.51,1.43,1.43,0,0,0,1.21,1.41A1.27,1.27,0,0,0,379.71,760.64Z"/>
                        <path class="cls-7" d="M210.12,353.29a326.8,326.8,0,0,1-121.18-23,1.47,1.47,0,0,1-.82-1.89,1.45,1.45,0,0,1,1.89-.82,324.17,324.17,0,0,0,127.6,22.74c17.43-.37,35.59-2.38,51.37-13.66a19.44,19.44,0,0,1-4.38-.65c-1.33-.3-2.84-.63-4.9-.9a1.46,1.46,0,0,1-.05-2.88,29.18,29.18,0,0,0,7.75-2.48,54.92,54.92,0,0,1,5.82-2.25,1.46,1.46,0,1,1,.87,2.79,48.26,48.26,0,0,0-5.53,2.13c-.76.33-1.51.66-2.29,1,2.54.54,4.14.62,8.14-1a1.46,1.46,0,0,1,1.5,2.46c-17.62,15.44-39.33,17.94-58.24,18.34C215.14,353.27,212.63,353.29,210.12,353.29Z"/>
                        <polygon class="cls-153" points="102.77 333.81 97.43 353.74 107.63 348.66 111.52 356.71 117.3 338.46 102.77 333.81"/>
                        <polygon class="cls-154" points="121.46 339.66 119.29 358.7 127.06 353.74 131.67 360.99 136.3 343.46 121.46 339.66"/>
                        <polygon class="cls-4" points="139.55 345.26 137.5 363.41 144.54 357.96 149.16 364.63 152.19 346.72 139.55 345.26"/>
                        <polygon class="cls-155" points="159.15 347.89 155.71 366.32 162.76 360.99 168.59 368.79 172.47 350.32 159.15 347.89"/>
                        <polygon class="cls-156" points="174.9 368.79 175.87 350.07 189.22 351.18 189.22 368.79 182.06 363.17 174.9 368.79"/>
                        <polygon class="cls-157" points="192.49 351.84 194.09 368.79 199.76 364.63 205.8 368.35 205.8 351.81 192.49 351.84"/>
                        <polygon class="cls-158" points="209.38 351.81 212.06 368.35 215.7 362.1 220.56 366.81 220.56 351.68 209.38 351.81"/>
                        <polygon class="cls-159" points="222.83 351.84 224.2 368.35 229.78 362.1 236.34 368.35 234.63 350.6 222.83 351.84"/>
                        <polygon class="cls-4" points="238.33 350.07 250.75 347.2 252.79 363.41 246.4 359.17 241.15 366.32 238.33 350.07"/>
                        <path class="cls-160" d="M425.81,836.66a29.31,29.31,0,0,0,6.36-10.78,29.43,29.43,0,0,0,2.13,18.94c-6.16,1.4-13.5-.87-20-2.94a4.83,4.83,0,0,1-3.27-5.16c.58-5.55-1.17-10.54-1.82-16.76,3,6.58,5,12.51,9.39,17.55a33.89,33.89,0,0,0,2.11-10.87A26.83,26.83,0,0,0,425.81,836.66Z"/>
                        <path class="cls-161" d="M425.81,836.66a29.31,29.31,0,0,0,6.36-10.78,29.43,29.43,0,0,0,2.13,18.94c-6.16,1.4-13.5-.87-20-2.94a4.83,4.83,0,0,1-3.27-5.16c.58-5.55-1.17-10.54-1.82-16.76,3,6.58,5,12.51,9.39,17.55a33.89,33.89,0,0,0,2.11-10.87A26.83,26.83,0,0,0,425.81,836.66Z"/>
                        <path class="cls-160" d="M630.53,838.21c-7.22-2.75-15.7-.86-23.58.47a37.31,37.31,0,0,0,.32-27.09c2.78,5.81,6,10.52,8.73,16.33,1.43-4,2.74-6.41,1-11.27,1.72,3.09,1.32,4.57,2.38,6.46s1.51,3.18,4.22,3.13c1.46,0,2.1-2.38,3.66-5.32C626.54,827.48,627.61,832,630.53,838.21Z"/>
                        <path class="cls-161" d="M630.53,838.21c-7.22-2.75-15.7-.86-23.58.47a37.31,37.31,0,0,0,.32-27.09c2.78,5.81,6,10.52,8.73,16.33,1.43-4,2.74-6.41,1-11.27,1.72,3.09,1.32,4.57,2.38,6.46s1.51,3.18,4.22,3.13c1.46,0,2.1-2.38,3.66-5.32C626.54,827.48,627.61,832,630.53,838.21Z"/>
                        <path class="cls-6" d="M231.65,834.25a38.54,38.54,0,0,0,4,19.21c-8.77-1.71-17.55-1.36-26.33-3.06,3.49-6.53,3.36-18.19,3.44-26.51.65,6.57,4.09,15,8.62,18.92.33-3.47.67-6.95,1-10.42-.14,4.66,2.9,9.17,6.78,10.06C230,839.72,230.8,837,231.65,834.25Z"/>
                        <path class="cls-6" d="M387,847.16a43,43,0,0,1-3.48,19.21,68.41,68.41,0,0,1,14-1.74c1.47,0,2.81.64,4.27.72.84,0,6.47-.63,6.81,0a22.12,22.12,0,0,1-4.51-9.14,46.92,46.92,0,0,1-1.7-11.05,14.56,14.56,0,0,1-2.15,5.3c-.52.79-1.31,1.58-2.15,1.33a2.3,2.3,0,0,1-1.18-1.23,22.47,22.47,0,0,1-1.38-5,34.13,34.13,0,0,1-.77-4.52c.08,4.16-1.77,13.36-5.56,14.34C388.5,852.63,387.76,849.89,387,847.16Z"/>
                        <path class="cls-162" d="M266.37,367.65a127.61,127.61,0,0,1-11.73,9.23,129.38,129.38,0,0,0-11.85,9.94s.11,1.65.22,2.42c.15-.16.57-.35.74-.51,2.41-2.33,5.11-4.57,7.74-6.81,7.21-6.14,14.39-12,18.11-16.21a18.14,18.14,0,0,0,4.44-9.79C272.5,361.28,269.5,364.72,266.37,367.65Z"/>
                        <path class="cls-33" d="M316,166.08S293,194.67,239.37,186.2c-34.86-5.51-52.14-21.89-60-32.69a5.82,5.82,0,0,0-9.8.51c-5.49,9.7-18,23.55-46,30.06-45.53,10.59-68.78-4.86-68.78-4.86"/>
                        <path class="cls-34" d="M59.22,182.57l.2-1.57-3.25-.42-.2,1.57a3.56,3.56,0,0,0-1.7,1.48l6.23.79A3.58,3.58,0,0,0,59.22,182.57Z"/>
                        <path class="cls-34" d="M109.79,188.82l.39-1.53-3.18-.81-.39,1.53a3.59,3.59,0,0,0-1.87,1.26l6.08,1.55A3.54,3.54,0,0,0,109.79,188.82Z"/>
                        <path class="cls-34" d="M159.58,168.12l-1.27-1-2,2.62,1.27,1a3.48,3.48,0,0,0,.44,2.2l3.78-5A3.56,3.56,0,0,0,159.58,168.12Z"/>
                        <path class="cls-34" d="M135.14,178.57l.55,1.49,3.08-1.14-.55-1.49a3.59,3.59,0,0,0,.82-2.09l-5.89,2.18A3.57,3.57,0,0,0,135.14,178.57Z"/>
                        <path class="cls-34" d="M172.24,150.07l.25,1.56,3.24-.51-.25-1.56a3.55,3.55,0,0,0,1.22-1.9l-6.2,1A3.59,3.59,0,0,0,172.24,150.07Z"/>
                        <path class="cls-34" d="M210.42,180.35l.91-1.3-2.68-1.89-.91,1.3a3.57,3.57,0,0,0-2.19.51l5.13,3.62A3.55,3.55,0,0,0,210.42,180.35Z"/>
                        <path class="cls-34" d="M257,188.9l-.35-1.55-3.2.74.35,1.54a3.57,3.57,0,0,0-1.08,2l6.12-1.41A3.62,3.62,0,0,0,257,188.9Z"/>
                        <path class="cls-34" d="M302.22,179.11l-.47-1.51-3.13,1,.46,1.52a3.56,3.56,0,0,0-.94,2.05l6-1.84A3.56,3.56,0,0,0,302.22,179.11Z"/>
                        <path class="cls-34" d="M84,186.37l.33,1.55,3.21-.68-.33-1.56a3.55,3.55,0,0,0,1.11-2L82.15,185A3.6,3.6,0,0,0,84,186.37Z"/>
                        <path class="cls-34" d="M191.3,163.93l-1,1.24,2.57,2,1-1.24a3.58,3.58,0,0,0,2.22-.39l-4.92-3.9A3.57,3.57,0,0,0,191.3,163.93Z"/>
                        <path class="cls-34" d="M232.57,183.46l0,1.58,3.28-.08,0-1.59a3.55,3.55,0,0,0,1.45-1.72l-6.27.16A3.56,3.56,0,0,0,232.57,183.46Z"/>
                        <path class="cls-34" d="M273.93,184.46l-.18,1.57,3.26.38.18-1.57a3.55,3.55,0,0,0,1.68-1.5l-6.23-.73A3.53,3.53,0,0,0,273.93,184.46Z"/>
                        <path class="cls-34" d="M312.89,166.25l.59,1.48,3-1.23-.59-1.47a3.54,3.54,0,0,0,.76-2.12l-5.82,2.34A3.5,3.5,0,0,0,312.89,166.25Z"/>
                        <path class="cls-33" d="M575,330S541.67,301.61,520,263.49a588.36,588.36,0,0,1-41.65-91.23S452,290,381.79,336.9"/>
                        <path class="cls-34" d="M467.5,205l1,.36.75-2-1-.36a2.3,2.3,0,0,0-.69-1.3l-1.42,3.84A2.27,2.27,0,0,0,467.5,205Z"/>
                        <path class="cls-34" d="M475.28,176.88l.94.43.89-1.95-.94-.43a2.3,2.3,0,0,0-.59-1.34l-1.7,3.73A2.31,2.31,0,0,0,475.28,176.88Z"/>
                        <path class="cls-34" d="M475.05,190l-.86-.57L473,191.23l.86.57a2.27,2.27,0,0,0,.37,1.42l2.28-3.4A2.35,2.35,0,0,0,475.05,190Z"/>
                        <path class="cls-34" d="M484.49,184.65l-.94.43.89,1.95.94-.44a2.29,2.29,0,0,0,1.41.43l-1.71-3.72A2.3,2.3,0,0,0,484.49,184.65Z"/>
                        <path class="cls-34" d="M500.9,224l-.94.43.89,1.95.94-.43a2.37,2.37,0,0,0,1.41.43l-1.71-3.73A2.3,2.3,0,0,0,500.9,224Z"/>
                        <path class="cls-34" d="M453.23,240l.92.48,1-1.91-.92-.47a2.33,2.33,0,0,0-.53-1.37l-1.87,3.64A2.28,2.28,0,0,0,453.23,240Z"/>
                        <path class="cls-34" d="M434.91,275.26l.92.47,1-1.9-.92-.48a2.37,2.37,0,0,0-.53-1.37l-1.87,3.65A2.36,2.36,0,0,0,434.91,275.26Z"/>
                        <path class="cls-34" d="M413.14,306l.61.83,1.72-1.28-.61-.83a2.37,2.37,0,0,0,.13-1.46l-3.29,2.44A2.28,2.28,0,0,0,413.14,306Z"/>
                        <path class="cls-34" d="M386.72,331.8l.6.83,1.74-1.25-.61-.84a2.29,2.29,0,0,0,.15-1.46l-3.32,2.4A2.37,2.37,0,0,0,386.72,331.8Z"/>
                        <path class="cls-34" d="M464.22,221.91l-.82-.64L462.09,223l.81.64a2.35,2.35,0,0,0,.27,1.44l2.52-3.23A2.35,2.35,0,0,0,464.22,221.91Z"/>
                        <path class="cls-34" d="M448.19,258.29l-.81-.64-1.32,1.69.82.64a2.28,2.28,0,0,0,.26,1.44l2.52-3.23A2.35,2.35,0,0,0,448.19,258.29Z"/>
                        <path class="cls-34" d="M428.66,291.05l-.81-.63-1.32,1.69.82.63a2.32,2.32,0,0,0,.26,1.45l2.52-3.23A2.31,2.31,0,0,0,428.66,291.05Z"/>
                        <path class="cls-34" d="M401.87,322.49l-.82-.63-1.31,1.69.81.63a2.29,2.29,0,0,0,.27,1.45l2.51-3.23A2.27,2.27,0,0,0,401.87,322.49Z"/>
                        <path class="cls-34" d="M491.13,206.94l.76-.7-1.44-1.58-.77.7a2.29,2.29,0,0,0-1.47,0l2.76,3A2.37,2.37,0,0,0,491.13,206.94Z"/>
                        <path class="cls-34" d="M517.61,256.53l-.94.43.89,2,.94-.43a2.34,2.34,0,0,0,1.4.43l-1.7-3.73A2.3,2.3,0,0,0,517.61,256.53Z"/>
                        <path class="cls-34" d="M506.42,240.53l.77-.7-1.45-1.58-.76.69a2.31,2.31,0,0,0-1.47,0l2.76,3A2.32,2.32,0,0,0,506.42,240.53Z"/>
                        <path class="cls-34" d="M539.66,289.88l-.76.71,1.47,1.56.76-.71a2.36,2.36,0,0,0,1.47-.05l-2.82-3A2.27,2.27,0,0,0,539.66,289.88Z"/>
                        <path class="cls-34" d="M526,275.67l.76-.69-1.44-1.59-.76.7a2.31,2.31,0,0,0-1.47,0l2.76,3A2.34,2.34,0,0,0,526,275.67Z"/>
                        <path class="cls-34" d="M564.81,318.56l-.94.43.9,1.95.94-.43a2.34,2.34,0,0,0,1.4.43l-1.71-3.73A2.3,2.3,0,0,0,564.81,318.56Z"/>
                        <path class="cls-34" d="M551.16,308.38l.76-.7-1.44-1.58-.77.7a2.37,2.37,0,0,0-1.47,0l2.76,3A2.35,2.35,0,0,0,551.16,308.38Z"/>
                        <g id="bombillos">
                        <circle id="b43" class="cls-163" cx="603.63" cy="288.41" r="5.46" transform="translate(-31.41 498.85) rotate(-43.87)"/>
                        <circle id="b42" class="cls-163" cx="575.53" cy="281.97" r="5.46" transform="translate(-55.69 392.87) rotate(-36.07)"/>
                        <circle id="b41" class="cls-163" cx="615.35" cy="255.93" r="5.46" transform="translate(131.82 714.57) rotate(-66.07)"/>
                        <circle id="b40" class="cls-163" cx="647.88" cy="307.56" r="5.46" transform="translate(-55.2 166.07) rotate(-14.02)"/>
                        <circle id="b39" class="cls-163" cx="700.18" cy="326.75" r="5.46" transform="translate(-64.93 434.57) rotate(-33.04)"/>
                        <circle id="b38" class="cls-163" cx="756.81" cy="316.06" r="5.46" transform="translate(23.29 682.94) rotate(-49.24)"/>
                        <circle id="b37" class="cls-163" cx="639.97" cy="280.61" r="5.46" transform="translate(61.53 672.67) rotate(-57.81)"/>
                        <circle id="b36" class="cls-163" cx="680.9" cy="307.61" r="5.46" transform="translate(194.86 875.07) rotate(-73.73)"/>
                        <circle id="b35" class="cls-163" cx="726.28" cy="309.74" r="5.46" transform="translate(3.25 627) rotate(-46.79)"/>
                        <circle id="b34" class="cls-163" cx="770.64" cy="288.59" r="5.46" transform="translate(140.66 818.02) rotate(-60.57)"/>
                        <circle id="b33" class="cls-163" cx="56.82" cy="188.44" r="5.46" transform="translate(-73.39 40.85) rotate(-24.64)"/>
                        <circle id="b32" class="cls-163" cx="106.68" cy="194.35" r="5.46" transform="matrix(0.95, -0.3, 0.3, 0.95, -53.8, 41.38)"/>
                        <circle id="b31" class="cls-163" cx="163.48" cy="173.12" r="5.46" transform="translate(-23.65 320.35) rotate(-84.84)"/>
                        <circle id="b30" class="cls-163" cx="134.55" cy="172.26" r="5.46" transform="translate(-84.02 173.1) rotate(-52.23)"/>
                        <circle id="b29" class="cls-163" cx="172.91" cy="143.76" r="5.46" transform="translate(-51.91 148.01) rotate(-40.82)"/>
                        <circle id="b28" class="cls-163" cx="205.55" cy="184.41" r="5.46" transform="translate(9.71 379.11) rotate(-86.73)"/>
                        <circle id="b27" class="cls-163" cx="256.77" cy="195.24" r="5.46" transform="translate(-62.85 238.75) rotate(-45)"/>
                        <circle id="b26" class="cls-163" cx="302.44" cy="185.45" r="5.46" transform="translate(-36.15 291.36) rotate(-48.89)"/>
                        <circle id="b25" class="cls-163" cx="84.29" cy="180.03" r="5.46" transform="translate(-101.32 108.88) rotate(-43.94)"/>
                        <circle id="b24" class="cls-163" cx="196.4" cy="160.15" r="5.46" transform="translate(14.9 337) rotate(-83.45)"/>
                        <circle id="b23" class="cls-163" cx="234.05" cy="177.29" r="5.46" transform="matrix(0.83, -0.55, 0.55, 0.83, -58.94, 158.09)"/>
                        <circle id="b22" class="cls-163" cx="276.27" cy="178.56" r="5.46" transform="translate(-49.77 134.91) rotate(-25.25)"/>
                        <circle id="b21" class="cls-163" cx="312.13" cy="159.96" r="5.46" transform="translate(-1.34 317.26) rotate(-53.78)"/>
                        <circle id="b20" class="cls-163" cx="464.13" cy="202.62" r="3.57" transform="translate(-31.21 97.2) rotate(-11.57)"/>
                        <circle id="b19" class="cls-163" cx="472.09" cy="174.25" r="3.57" transform="translate(-18.43 61.91) rotate(-7.36)"/>
                        <circle id="b18" class="cls-163" cx="477.78" cy="193.14" r="3.57" transform="translate(268.81 664.2) rotate(-88.09)"/>
                        <circle id="b17" class="cls-163" cx="488.57" cy="183.95" r="3.57" transform="translate(65.88 490.34) rotate(-56.57)"/>
                        <circle id="b16" class="cls-163" cx="504.98" cy="223.3" r="3.57" transform="translate(40.41 521.71) rotate(-56.57)"/>
                        <circle id="b15" class="cls-163" cx="450.16" cy="237.19" r="3.57" transform="translate(-18.14 38.2) rotate(-4.76)"/>
                        <circle id="b14" class="cls-163" cx="431.84" cy="272.48" r="3.57" transform="translate(-21.13 36.8) rotate(-4.76)"/>
                        <circle id="b13" class="cls-163" cx="411.61" cy="302.11" r="3.57" transform="translate(-20.47 574.14) rotate(-68.47)"/>
                        <circle id="b12" class="cls-163" cx="385.24" cy="327.93" r="3.57" transform="translate(-63.91 560.75) rotate(-67.81)"/>
                        <circle id="b11" class="cls-163" cx="466.72" cy="225.21" r="3.57" transform="translate(193.72 665.68) rotate(-83.97)"/>
                        <circle id="b10" class="cls-163" cx="450.69" cy="261.59" r="3.57" transform="translate(143.19 682.3) rotate(-83.97)"/>
                        <circle id="b9" class="cls-163" cx="431.16" cy="294.36" r="3.57" transform="translate(93.13 692.2) rotate(-83.97)"/>
                        <circle id="b8" class="cls-163" cx="404.36" cy="325.8" r="3.57" transform="translate(37.89 693.7) rotate(-83.97)"/>
                        <circle id="b7" class="cls-163" cx="487.45" cy="208.84" r="3.57" transform="translate(154.01 621.19) rotate(-74.23)"/>
                        <circle id="b6" class="cls-163" cx="521.69" cy="255.83" r="3.57" transform="translate(20.77 550.26) rotate(-56.57)"/>
                        <circle id="b5" class="cls-163" cx="502.74" cy="242.43" r="3.57" transform="matrix(0.27, -0.96, 0.96, 0.27, 132.82, 660.37)"/>
                        <circle id="b4" class="cls-163" cx="543.3" cy="287.91" r="3.57" transform="translate(126.75 740.18) rotate(-75.27)"/>
                        <circle id="b3" class="cls-163" cx="522.3" cy="277.58" r="3.57" transform="translate(113.24 704.79) rotate(-74.23)"/>
                        <circle id="b2" class="cls-163" cx="568.89" cy="317.86" r="3.57" transform="translate(-9.8 617.51) rotate(-56.57)"/>
                        <circle id="b1" class="cls-163" cx="547.48" cy="310.28" r="3.57" transform="translate(100.1 752.84) rotate(-74.23)"/>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
    </div>
    <div class="formulario">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="inscripciondocenteForm">
            <div class="contenedorFormulario">
                <div class="userTitle">
                    <p class="tituloIsa">INFORMACIÓN PERSONAL</p>
                    <div class="bg-danger text-white"><?php echo $form_err;?></div>
                </div>
                <div class="userName">
                    <div class="row">
                        <div class="col">
                            <label for="codCartilla" class="form-label labelRF">Nombre Completo</label>
							<div class="input-group">
                                <span class="input-group-text spanRF"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.76 30.69"><defs><style>.cls-1{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><g id="Layer_6" data-name="Layer 6"><path class="cls-1" d="M15.24,17a4.81,4.81,0,1,0-6.8-.16L8.6,17a7.64,7.64,0,0,0-4.28,6.85,1.07,1.07,0,0,0,1.07,1.07H18.55a1.06,1.06,0,0,0,1.07-1v0A7.6,7.6,0,0,0,15.24,17Zm-6-3.47a2.67,2.67,0,1,1,2.67,2.67h0a2.66,2.66,0,0,1-2.66-2.65ZM6.52,22.79a5.51,5.51,0,0,1,10.8,0Z"/><path class="cls-1" d="M34.11,15.56H22.69a1.07,1.07,0,0,1,0-2.14H34.11a1.07,1.07,0,0,1,0,2.14Z"/><path class="cls-1" d="M30.81,20.27H22.73a1.07,1.07,0,0,1,0-2.14h8.08a1.07,1.07,0,0,1,0,2.14Z"/><path class="cls-1" d="M34.71,2.39H25A2.62,2.62,0,0,0,22.42,0H17.35a2.61,2.61,0,0,0-2.6,2.39H5.05A5,5,0,0,0,0,7.44v18.2a5,5,0,0,0,5.05,5.05H34.71a5,5,0,0,0,5-5.05h0V7.44a5,5,0,0,0-5-5.05Zm-18,.25A.62.62,0,0,1,17.35,2h5.07a.62.62,0,0,1,.6.62V4.17a.6.6,0,0,1-.6.6H17.35a.6.6,0,0,1-.61-.6Zm21,23a3,3,0,0,1-3,3H5.05a3,3,0,0,1-3-3V7.44a3,3,0,0,1,3-3h9.7a2.6,2.6,0,0,0,2.6,2.38h5.07A2.61,2.61,0,0,0,25,4.41h9.69a3,3,0,0,1,3,3Z"/></g></g></g></svg></span>
								<input type="text" class="form-control inputRF" value="<?php echo $FullName; ?>" readonly>
							</div>
                        </div>
                    </div>
                </div>
                <div class="userName">
                    <div class="row">
                        <div class="col">
                            <label for="codCartilla" class="form-label labelRF">Nombre de Usuario</label>
							<div class="input-group">
                                <span class="input-group-text spanRF"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.85 30.35"><defs><style>.cls-1{fill:#fff;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><g id="_05_user" data-name=" 05 user"><path class="cls-1" d="M11.92,0A8.67,8.67,0,1,0,20.6,8.67,8.67,8.67,0,0,0,11.92,0Zm0,15.18a6.51,6.51,0,1,1,6.51-6.51A6.51,6.51,0,0,1,11.92,15.18Z"/><path class="cls-1" d="M11.92,15.18A11.92,11.92,0,0,0,0,27.1a3.25,3.25,0,0,0,3.25,3.25H13.66a1.09,1.09,0,1,0,0-2.17H3.25A1.08,1.08,0,0,1,2.17,27.1a9.76,9.76,0,1,1,19.51,0,1.08,1.08,0,0,1-1.08,1.08H19.51a1.09,1.09,0,0,0,0,2.17H20.6a3.25,3.25,0,0,0,3.25-3.25A11.93,11.93,0,0,0,11.92,15.18Z"/></g></g></g></svg></span>
								<input type="text" class="form-control inputRF" value="<?php echo $Username; ?>" readonly>
							</div>
                        </div>
                        <div class="col">
                            <label for="codCartilla" class="form-label labelRF">Teléfono</label>
							<div class="input-group">
								<span class="input-group-text spanRF"><?php echo $telefono ?></span>
								<input type="text" class="form-control inputRF" value="<?php echo $Phone; ?>" readonly>
							</div>
                        </div>
                    </div>
                </div>
                <div class="userName">
                    <div class="row">
                        <div class="col">
                            <label for="codCartilla" class="form-label labelRF">Email</label>
							<div class="input-group">
								<span class="input-group-text spanRF"><?php echo $arroba ?></span>
								<input type="text" class="form-control inputRF" value="<?php echo $Email; ?>" readonly>
							</div>
                        </div>
                    </div>
                </div>
                <div class="userName">
                    <div class="row">
                        <div class="col">
                            <label for="codCartilla" class="form-label labelRF">Cartilla</label>
							<div class="input-group">
								<span class="input-group-text spanRF"><?php echo $cartilla ?></span>
								<input type="text" class="form-control inputRF letraClave" value="<?php echo $laLicencia; ?>" readonly>
							</div>
                        </div>
                        <div class="col">
                            <label for="codCartilla" class="form-label labelRF">Contraseña</label>
							<div class="input-group">
								<span class="input-group-text spanRF"><?php echo $accesoPass ?></span>
								<input type="text" class="form-control inputRF letraClave" value="<?php echo $unencodedPassword; ?>" readonly>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contenedorFormulario">
                <div class="userTitle">
                    <p class="tituloIsa">INFORMACIÓN  DEL COLEGIO</p>
                </div>
                <div class="userName">
                    <div class="row">
                        <div class="col">
                            <label for="codCartilla" class="form-label labelRF">Institución</label>
							<div class="input-group">
								<span class="input-group-text spanRF"><?php echo $instituto ?></span>
								<input type="text" class="form-control inputRF" value="<?php echo $Institution; ?>" readonly>
							</div>
                        </div>
                    </div>
                </div>
                <div class="userName">
                    <div class="row">
                        <div class="col">
                            <label for="codCartilla" class="form-label labelRF">Grupo y Curso</label>
							<div class="input-group">
								<span class="input-group-text spanRF"><?php echo $curso ?></span>
								<input type="text" class="form-control inputRF" value="<?php echo $hmtlGroup; ?>" readonly>
							</div>
                        </div>
                    </div>
                </div>
                <input class="btnNext" type="submit" value="Ingresar">
            </div>
        </form>
    </div>
</div>

<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>  
<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>

<script>
    var contenedor = document.querySelector("#contenedor");
    var elemento = new Image();
    elemento.src = "img/fomrLarge/nube.png";
    elemento.classList.add("nube");


    var repeticiones = 15;
    for (var i = 0; i < repeticiones; i++) {
        var sizeNube = Math.floor(Math.random() * 9) + 1;
        elemento.style.width = sizeNube + "vw";
        var posicionX = Math.floor(Math.random() * 90) + 1;
        var posicionY = Math.floor(Math.random() * 80) + 1;
        var elementoCopia = elemento.cloneNode(true);
        elementoCopia.style.left = posicionX + "%";
        elementoCopia.style.top = posicionY + "%";
        contenedor.appendChild(elementoCopia);
    }
</script>

</body>
</html>

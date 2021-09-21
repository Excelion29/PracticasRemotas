<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/stilos.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">


    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css">
    


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choza N. - @yield('title')</title>

    
</head>
<body>

    <!-- Loader -->
    <div class="loader" id="loader">
        <div class="spinner-container">
            <div class="spinner">
               <div class="bubble bubble--1"></div>
               <div class="bubble bubble--2"></div>
               <div class="bubble bubble--4"></div>
               <div class="bubble bubble--3"></div>
               <div class="bubble bubble--5"></div>
               <div class="bubble bubble--6"></div>
              <div class="aliment aliment--1"></div>
              <div class="aliment aliment--2"></div>
              <div class="aliment aliment--3"></div>
               <div class="stove">
                  <div class="stove--handle"></div>
                  <div class="stove--base"></div>
                </div>
            </div>
          </div>
        </div>
    <!--navbar -->
    <div class="navbar">
        <div class="logo">
            
            <svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1456.81 570.57"><defs></defs><title>logosuvg</title><path class="cls-1" d="M0,531.13C3.94,516.76,8.32,502.48,11.73,488c5.89-25.06,11.76-50.15,16.54-75.43a231.61,231.61,0,0,0,2.95-67.13c-.64-6.2-3.47-9.09-9.06-10.8-8.47-2.59-11.58-7.75-9.25-15.29a8.61,8.61,0,0,1,4.66-4.73c8.51-3.22,8.57-3.05,8.57-12.18,0-10.75,0-10.71,10.09-14.64a7.56,7.56,0,0,0,3.36-2.59c7-10.11,22.24-15.83,34-12.62,10.48,2.87,15.84,10,16.1,22.94.19,10-.45,20-.79,30-.09,2.74-.55,5.38-4.92,4.53-.66,9.5-1.31,18.77-1.94,28-.41,6-.32,12-1.31,17.91C80,380.43,78,384.76,76.29,389c-3.78,9.17-8,18.16-11.58,27.42-1.45,3.79-.25,7.56,3.69,9.86s6.55-.14,8.71-2.59c12.2-13.87,24.46-27.69,36.23-41.92,13-15.65,25.44-31.69,38-47.65,1.87-2.37,3.51-3.8,6.63-2.2,3.49,1.79,4.72-1.1,6-3.39,8.4-15.06,18.94-28.6,33.41-37.88,11.94-7.66,25.27-13.17,38.14-19.31,1.48-.71,4,.64,6,1.16,11,2.82,13.18,11.05,12.15,20.76-.59,5.56-2.2,11-3.12,16.53a43.78,43.78,0,0,0,0,6.79c-3.37,1.45-7.15,2.72-10.57,4.65-5.35,3-6.39,6.5-2.93,11.57,4.27,6.25,4.57,10.33-4.3,15.1-8.17,4.39-12.26,7.06-6.92,20.38,3,7.51,2.71,13.7-.74,21.19-16.25,35.3-26.88,72.28-30.11,111.14A95.77,95.77,0,0,0,196,522.46c1,6.93,4,8.61,10.85,7.86a77.76,77.76,0,0,0,8.75-1.84c3.82-.88,6,.74,7.19,4.32,2.71,8.31,4.29,9.51,13,10.14,5.7.41,6.85,2,4.5,7.17-3.24,7.06-7.26,12.81-15.87,15-12.2,3-23.95,7.92-36.09,11.26a22.63,22.63,0,0,1-12.67-.63,101.53,101.53,0,0,1-32.93-19.36c-5.54-4.74-7.17-10.28-5.42-17.35,5.77-23.44,12.32-46.55,22.9-68.44,2.69-5.55,2.05-12.64,3.38-18.93,3.19-15.1,6.68-30.15,10-45.22,1.6-7.3,3.48-14.57,4.47-21.95,1.05-7.77-.3-8.67-7.87-6.23-11.67,3.77-21.21,11-30.09,19.18-22.29,20.43-39.86,44.74-56.47,69.75-18,27.05-34.92,54.71-48.62,84.23-1.7,3.65-4.19,4.68-7.62,2.94a99.05,99.05,0,0,1-10.74-6.24c-5.63-3.83-11.07-8-16.59-12Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M1171.33,590.86C1014,590.86,886.11,463,886.08,305.64s127.78-285.33,285.1-285.36c157.62,0,285.78,128.07,285.63,285.46S1328.69,590.85,1171.33,590.86ZM1165,299c2.26-.28,4.54-.47,6.78-.85,7.33-1.25,9.23.58,8.11,7.88-.33,2.13-.59,4.28-.89,6.43l1.28.48,23.4-32.13c4,1.89,7.38,3.25,10.53,5s5.8,1.89,9-.27c5.81-3.86,12.09-7,18-10.7,2.4-1.49,4.26-1.48,6.78-.21,13.38,6.73,26.86,13.25,40.32,19.81,4.7,2.29,9.43,4.5,14.14,6.75a14.13,14.13,0,0,0-2.43-5.68c-15.81-26.22-32-52.22-47.23-78.79-8.89-15.52-18-30.75-30.11-44-8.27-9.05-17.44-17-29.83-20-10.35-2.51-14.49-.37-19,9.31-2.81,6-5.74,12-9,17.76-3.17,5.57-8.43,9-14.69,9.07-7.55.07-15.1-1.3-22.67-1.78-1.83-.12-4.3.23-5.51,1.38q-29.1,27.79-57.89,55.92c-6.27,6.14-12,12.85-18.1,19.47,11.37,10.8,26.45,19.85,31.61,37.67,1.93-1.24,3.34-2.08,4.68-3,12.08-8.3,24.2-16.54,36.18-25,2.39-1.68,4.17-1.91,6.7-.37,6.83,4.15,13.72,8.22,20.82,11.87a10.33,10.33,0,0,0,7.23.6c6.89-2.29,13.56-5.2,20.5-8,.49,1.72.77,3,1.23,4.25,2,5.35.33,9.15-4.55,12-2,1.21-3.57,3.32-5.32,5a1.6,1.6,0,0,0-.38.23s0,.17,0,.26Zm-16.48,73.37a26.75,26.75,0,0,0,.35-3c-1-21.3-2.15-42.6-3.1-63.9-.18-4.18-1.56-7-5.52-9a134,134,0,0,1-14.49-8.83c-2.22-1.5-3.66-1.2-5.67.3-13.87,10.39-27.86,20.61-41.7,31a8.7,8.7,0,0,0-3.12,4.68c-1.31,6.35-2.16,12.79-3.24,19.18-1.71,10.11-3.46,20.22-5.17,30.18-18.26,1-35.16,4.58-50.48,14-2.59,1.6-5.87,2.31-8.93,2.92-14,2.77-28.17,4.9-42.05,8.2a118.86,118.86,0,0,0-23.21,8.65c-5.1,2.42-5.11,6.18-.68,9.78a27.64,27.64,0,0,0,8.61,4.9c11.53,3.76,23.19,7.13,34.8,10.64,1.74.52,3.49,1,5.23,1.5,0,.45-.11.89-.16,1.33-4.38.81-8.79,1.5-13.13,2.46-3.32.74-7.41.91-7.49,5.75,0,3.74,3.75,7.59,7.87,8.21,12.33,1.87,24.76,3.21,37,5.64,14.91,3,29.58,2.49,45.71-.76l-28.91-14.41.54-1.38c6.59.81,13.18,1.56,19.76,2.44,3.16.42,5.85.48,7.54-3.08.48-1,2.56-1.72,4-1.84,8-.68,15.94-1.59,23.91-1.57,12.29,0,24.84-.69,36.8,1.5,17.27,3.16,34.09,8.73,51.16,13a55.7,55.7,0,0,0,13.74,1.84c4.31,0,5.67-3.79,2.71-6.94a26.23,26.23,0,0,0-6.77-5c-7.42-3.95-15-7.63-23.21-11.79,1.6-.08,2.51-.2,3.41-.15,17,.79,34,1.54,50.91,2.45,12.14.64,24.29,1.19,36.37,2.36,19.21,1.87,38.32,5.16,57.55,6.11,20.58,1,41.27.09,61.91-.11,3.35,0,6.69-.65,11.25-1.12l-9.18-8.25a72.2,72.2,0,0,1,7.75-2.28c4.75-.82,9.56-1.31,14.33-2,9.25-1.35,10.91-5.42,5.71-13.22-8.08-12.14-19.41-19.29-33.37-22.85-24.66-6.27-49.87-8.44-75.13-9.68-34.11-1.68-68.24-2.92-102.38-4-33.8-1-67.62-1.61-101.44-2.38-3.21-.07-6.44,0-9.65,0v-1.62Zm51.75,3.17h76.42c-1.9-23.82-3.74-47.51-5.8-71.19a6.71,6.71,0,0,0-3.12-4.3c-5.88-3.45-12-6.4-17.92-9.83-2.61-1.53-4.45-1.13-6.72.55-5.19,3.83-10.56,7.44-16,11.22-3.26-2.35-6.31-4.63-9.45-6.78a5.38,5.38,0,0,0-3.07-1.21c-2.53.24-9.57,8.25-9.76,10.94q-1.43,21.15-2.77,42.31C1201.54,356.35,1201,365.44,1200.3,375.55Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M825.25,299.34c-10.57,8.52-20.31,15.94-32.51,19.18-5,1.33-7.46-.35-7.47-5.63,0-6.28.84-12.57,1.31-18.86.14-1.81.64-3.74.2-5.4-.29-1.08-1.89-2.18-3.1-2.51-.64-.17-1.85,1.2-2.56,2.07-.92,1.12-1.31,2.81-2.4,3.62-11.57,8.66-23.12,17.36-34.93,25.68-3.46,2.44-7.87,4.65-9.74-2.32a4.92,4.92,0,0,0-2.85-2.61c-4.55-1.66-6.61-4.75-6.22-9.95-7.62,13.61-20.45,18.08-34.31,20.35-14.11,2.31-27.78-.71-41.37-4.29-3.73-1-7.69-1.07-12.67-1.72-1-4.27-2.49-9.51-3.26-14.86-.22-1.52,1.31-3.82,2.69-4.95,3.71-3,8.45-5,11.59-8.49,12.35-13.72,24.36-27.74,36.2-41.9,2.54-3,3.82-7.1,5.69-10.69l-1-1.44c-4.86.53-9.79.71-14.56,1.68-10.44,2.13-20.5.44-30.5-2.35-3.11-.87-4.68-2.57-2.42-5.84a7.21,7.21,0,0,0,1-2.75c1.64-9.23,1.62-9.23,9-15.72,2.32,7.59,8.43,6.52,14.27,6.5,18.13-.09,36.27,0,55,0,.57,4.56.87,9.54-2.5,14-6.51,8.65-14.05,16.71-19.29,26.06S684.1,271,678,279.34c-3.56,4.92-7.2,9.78-11.35,15.4,19.79,8.48,39,1.74,58.37,3.77,0-4.77-.53-9,.13-12.94a147.33,147.33,0,0,1,4.56-19.21,97.76,97.76,0,0,1,5.76-13.57,12.7,12.7,0,0,1,3.66-4.64c12-8.93,24-17.88,36.32-26.39,2.63-1.82,6.7-3,9.75-2.47,8,1.4,13.87-1.92,19.61-6.44.92-.72,1.77-1.51,2.45-2.1,4.26,1.81,8.24,3.77,12.4,5.18,3.39,1.14,3.64,2.84,2.81,6-4.46,17-8.8,34-12.88,51.13a35.69,35.69,0,0,0-.46,10.93c.44,5.42,3.58,9.13,8.54,11.37C819.93,296.39,822,297.64,825.25,299.34ZM749.92,278.8l1.11.3c0,2.65-.34,5.36.07,7.95.92,5.81,4.27,7.59,9,4.32,6.27-4.3,12.07-9.29,18-14.07a9.19,9.19,0,0,0,2.43-3.13c3.74-7.91,7.61-15.78,11-23.85a66.2,66.2,0,0,0,4.36-14.7c.92-5.82-2.34-8.46-8-7.42-14.87,2.73-29.18,16.55-32.43,31.27-.32,1.45-.91,2.83-1.31,4.27C752.73,268.76,751.33,273.78,749.92,278.8Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M533.85,298.54c-3.46,5.52-6.77,11.17-10.56,16.48-.69,1-3.45,1-5.07.68-4.59-1-8.54-.93-12.74,2-1.77,1.25-5.92.69-8.12-.57-3.71-2.12-6.22-5.88-4.86-10.54,2.6-8.93,5.49-17.78,8.37-26.63,2.26-7,4.69-13.86,7-20.79.42-1.26,1.25-2.63,1.06-3.81-.55-3.35-1.53-6.64-2.34-9.95-3.07.77-6.92.63-9.07,2.47-19.61,16.76-35.07,36.39-40.66,62.32-1.6,7.38-3.86,9-11.46,7.09-12.06-3-14.48-6.81-12-18.79.37-1.79.75-3.58,1.19-5.36,8.6-34.67,17.32-69.31,25.7-104a125,125,0,0,0,2.8-20.71c.51-7.4-1.46-14.22-6.55-18.71,5.3-3.07,10.69-6.21,16.11-9.29,4.3-2.45,8.63-5.83,13.84-2.92s6.45,8.1,6.5,13.72c.11,14.25-4.76,27.4-8.68,40.8-4.86,16.57-9.51,33.22-13.77,49.95-.8,3.17.62,6.92,1,10.4,2.94-1.49,6.34-2.45,8.73-4.55,11.63-10.23,22.89-20.88,34.52-31.11,2.76-2.43,6.27-4.92,9.72-5.45,11.13-1.7,21.36,10.08,17.8,20.82-4.75,14.35-10.52,28.36-15.85,42.51-.18.47-.37.93-.55,1.4C521.26,288.85,521.9,290.88,533.85,298.54Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M345.54,399.66c4.26-2.85,8.59-6.93,13.72-8.82,4.55-1.67,10.15-1.71,15-.81,2,.37,3.78,5,4.46,7.91a53.62,53.62,0,0,1,1.05,12.86,33.91,33.91,0,0,1-1.46,10.6c-5.2,15-9,30.25-10.08,46.11a33.51,33.51,0,0,0,.54,6.45c1.35,10.1,7,13.75,16.3,9.43a36,36,0,0,0,12.71-10c12.3-15.65,20-33.44,20.82-53.51.21-5-1.57-10.5-3.74-15.15-2-4.18-1.46-6.49,2.35-8.37,4.76-2.33,9.58-4.56,14.41-6.74,4.5-2,8.41-.89,11.8,2.5q1.59,1.59,3.23,3.13c3.43,3.26,4.31,6,2.53,11.43-4.39,13.35-6.95,27.31-10.1,41.07-1.93,8.42-3.51,16.92-5.41,25.35-1.83,8.14-.45,12,6.29,16.67,4.21,2.91,3,3.38.08,7.16-5.83,7.5-15.5,7.75-22.07,13.61-4.16,3.71-12.58-.26-13.19-5.75-.35-3.13-.4-6.31-.55-9.46-.23-4.85-3.77-6.87-8.07-4.36-10.47,6.13-20.85,12.41-31.26,18.62a6,6,0,0,1-.83.56c-8.05,2.88-14.18-1.46-20.12-5.71-4.85-3.48-8.61-7.52-6.95-14.61,3.78-16.17,7.61-32.36,10.39-48.71,1.59-9.27,1.51-18.88,1.45-28.34C348.81,408.77,346.9,404.8,345.54,399.66Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M420.63,287.78c-3.06,3.69-3.54,7-1,11.29,2.35,4-.79,8.27-5.51,10-5.07,1.83-9.91,4.35-15,5.94-2.85.89-6.1.55-9.17.68-3.34.14-6.84-.41-10,.39-19.63,4.92-38.62,4.09-56.49-6.1-3.63-2.08-6.76-5.35-9.5-8.6a12.3,12.3,0,0,1-2.17-13.43c2.34-5.85,1.09-7.71-5.18-8.95-4.41-.88-5.37-3.63-5.59-7.52-.91-16.33,5.14-30.61,12.85-44.41,7.89-14.13,18.39-26.09,30.61-36.62.38-.32.72-.81,1.16-.92,7.06-1.78,11.78-7.44,17.88-10.83a68.49,68.49,0,0,0,10.68-7.13,66.62,66.62,0,0,1,36.76-15.24c2.79-.29,5.73,1.06,8.61,1.56a62.09,62.09,0,0,0,8.73,1.28c6.63.19,12.76,5.6,12.56,12.15-.05,1.76-2.07,4-3.79,5.06-3.38,2-7.18,3.33-11.36,5.19-4.54-4.24-10.49-7.17-17.23-5.42-8.18,2.13-16.18,4.5-24.67,5.63-4.73.63-9.71,4.68-13.18,8.47-7.72,8.43-14.74,17.54-21.69,26.64a19.45,19.45,0,0,0-3.72,16.08,7.89,7.89,0,0,1-.4,4.85c-5.35,10-4.71,20.47-2.12,30.82,3,11.92,10.5,21,20.06,28.46a2.72,2.72,0,0,0,.81.57c14.39,3.65,28.8,9.57,42.61-2,4-3.37,8.9-5.7,13.38-8.5Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M783.05,388.29c4.79,2.06,9.12,4.09,13.59,5.77,2.92,1.1,3.59,2.46,2.76,5.63-4.56,17.48-9,35-13.08,52.6-1.28,5.61-1.42,11.54-1.55,17.34-.16,6.87,3.47,11.54,9.65,14.41,2.34,1.09,4.53,2.51,7.56,4.22-10.92,9.35-21.41,17.69-34.59,21.58-6,1.77-8.38,0-8.31-6.19.09-7.77,1.09-15.53,1.55-23.31a11.85,11.85,0,0,0-.71-5.68c-1.19-2.41-4.29-2.11-5.62,0-1.9,3-3.55,6.43-6.2,8.57-10.23,8.24-20.75,16.1-31.3,23.93a21.19,21.19,0,0,1-7.59,3.62c-1.35.31-3.43-1-4.69-2.07-2.24-2-3.8-4.83-6.21-6.53-2.65-1.87-4.35-3.58-4.27-7.14.18-9.13-.72-18.34.16-27.39.61-6.28,3.3-12.39,5.35-18.48a114.69,114.69,0,0,1,5.2-12.75c1.12-2.34,2.52-4.87,4.49-6.41,13-10.11,26.17-20,39.3-29.89,3.83-2.89,8-3.14,12.74-2.59a21.83,21.83,0,0,0,10.93-2C776.21,393.74,779.64,390.64,783.05,388.29Zm-62.74,79.82.71.26a51.67,51.67,0,0,0,.9,6.37c1.84,6.91,4.49,8.27,10.22,4.17,6.72-4.8,12.86-10.43,19.16-15.8a10.37,10.37,0,0,0,2.59-3.61c3.29-7.39,6.53-14.81,9.64-22.28,2.23-5.35,4.9-10.65,6.11-16.24.81-3.74.82-9.84-1.36-11.47-2.62-1.95-8.39-1.39-12,.05a54.77,54.77,0,0,0-25,19.82c-2,2.89-3,6.55-4.12,10-1,3-1.39,6.1-2.11,9.15C723.46,455,721.87,461.57,720.31,468.11Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M310.77,388.19c4.76,2.09,8.74,4.15,12.94,5.57,3.51,1.2,4.69,2.58,3.5,6.51-2.84,9.37-5.41,18.84-7.53,28.4-2.61,11.79-4.94,23.67-6.86,35.59-1.59,9.87,1.95,17.3,11.93,20.87,1.5.53,2.75,1.77,4.43,2.89-.57.84-.87,1.67-1.46,2.06-9.09,6.08-18.19,12.15-27.39,18.08a14.76,14.76,0,0,1-5.16,1.76c-6,1.17-8.25-.36-8.15-6.56.14-7.62,1-15.23,1.52-22.85.11-1.78.31-3.75-.33-5.31-.42-1-2.23-1.92-3.48-2-.8-.06-1.87,1.34-2.55,2.28-1.12,1.57-1.66,3.75-3.07,4.87q-17.82,14.07-35.91,27.75a14.62,14.62,0,0,1-6.34,2.75c-1.31.2-3.14-1-4.28-2-2.34-2.15-4.07-5-6.59-6.87s-4-3.49-3.92-6.81c.42-11.1.14-22.25,1-33.31.35-4.44,3-8.72,4.66-13,1.6-4.12,3.2-8.26,5.05-12.29.94-2.06,2-4.4,3.7-5.72,13.52-10.51,27.12-20.93,40.94-31,2.32-1.7,6.14-2.9,8.79-2.29,8.29,1.91,14.62-1.26,20.66-6.14Zm-11.35,27.9c-.95-7.57-3.46-9.43-11.33-8-14.41,2.65-30.94,19.61-33.31,34-.4,2.44-1.62,4.73-2.07,7.17-1.29,7.11-2.59,14.23-3.43,21.4-.26,2.14.78,4.55,1.62,6.68,1.55,3.88,4.38,5,7.87,2.42,5.88-4.31,11.72-8.69,17.34-13.34a21.49,21.49,0,0,0,5.67-6.86c3.79-7.89,7.28-15.93,10.57-24C295,429.17,297.08,422.59,299.42,416.09Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M460.59,410.92c1.54-1.91,2.77-4.22,4.67-5.64,4.65-3.49,9.68-6.48,14.42-9.85a15.08,15.08,0,0,0,6.55-12.8c.09-6.63,1.6-12.37,8.4-15.72,2.07-1,3.4-3.94,4.62-6.23,3.7-6.94,15-12.6,22.94-10.71-.55,2-1,4-1.66,6-2.68,8.38-5.76,16.66-8,25.15-2,7.42,1.77,10.82,9.22,9.09,2.42-.57,4.79-1.39,7.22-1.95,4-.94,6,1.52,6.82,4.86,1,3.68-1.84,4.53-4.59,5.08-4.32.86-8,1.92-10.07,6.84-.88,2.08-5.15,3.16-8.08,3.87-8.28,2-8.22,1.84-9.57,9.91-2.62,15.73-5.24,31.47-8.13,47.16a17.77,17.77,0,0,0,20.47,20.82c5.32-.9,10.6-2,17-3.16-3.37,8.2-4.51,16.18-13.41,18.7-10,2.85-19.93,6.58-30.16,8.36-15,2.6-23.93-5.95-24.93-22.48-.29-4.64-.05-9.31-.05-14.33l3-.92c3.31-18.22,6.47-35.68,9.66-53.14,1-5.31-3.25-9.24-9.22-8.49-2.06.26-4.11.6-6.16.9Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M631.05,252.93c-1,15.4-6.49,30.53-20.12,42.1-8.38,7.12-16.43,14.61-24.59,22-2,1.82-3.73,3.43-6.94,2.22a8.59,8.59,0,0,0-6.35,0c-5.09,2.69-8.91.09-12.95-2.17-.29-.16-.57-.36-.87-.49-11-4.69-14.51-13.32-15.5-24.86-1.42-16.53,2.78-30.43,13.67-42.77,5.72-6.48,10.65-13.65,16.13-20.35,6.49-7.92,14.22-13.3,25.25-12.58,6.12.39,12.31-.43,18.46-.3a6.35,6.35,0,0,1,4.6,2.55A68.23,68.23,0,0,1,631.05,252.93Zm-34.67-22.64C586.08,239.7,575.63,247,575,262.16c-.46,10.32-6.81,20.17-3.85,31,.82,3,2,7.06,4.23,8.17s6.36-.18,9.1-1.54a14.31,14.31,0,0,0,5.82-6c4.63-8.77,9-17.68,13.08-26.74,1.08-2.4,1-5.6.61-8.33-.93-7.07-2.08-14.13-3.61-21.1C599.8,235.21,597.91,233.05,596.38,230.29Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M701.06,397.58c-1.52,3.61-2.92,6.62-4,9.72-1.48,4.08-4.69,5.74-8.55,5.56a63.66,63.66,0,0,1-11.22-2c-10.91-2.52-19.29.82-25.07,10.48s-7.56,20.86-9.1,31.91a93.9,93.9,0,0,0-1,12.41c-.1,16.53,9.65,24.15,25.79,20,4.42-1.14,8.55-3.41,14.13-5.7,0,4.57.18,8.93-.15,13.25-.06.82-2,1.82-3.27,2.18-3.67,1.06-7.73,1.22-11,2.91a27.5,27.5,0,0,0-9.32,7.62c-2.8,3.76-6.37,6.24-10.42,5.58-5.91-1-12.11-2.58-17.18-5.61s-8.92-7.91-13-12.25a16.16,16.16,0,0,1-4.83-13.42c.52-6.18-.72-12.6-1.77-18.81-3-17.77,5-30.54,18-41.23,2.44-2,5.13-3.78,7.27-6.07,2-2.09,3.22-4.82,5-7.1,1.56-2,3.06-4.68,5.2-5.53,11.42-4.54,23-8.73,34.6-12.75C686.19,387,698.12,392.9,701.06,397.58Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M695.78,119c18.72,0,36.65-.05,54.58,0,8.85,0,12.23,2.63,15.4,11.55-5.79,3-10.77,6.87-11.58,15.34-4.2-2.37-7.29-4.48-10.66-5.92-3.87-1.65-7.93-3.61-12-3.88-16.31-1.09-32.62-1-48.66,2.85-4.52,1.09-9,2.49-13.51,3.48-1.6.35-3.38-.11-5.81-.24L674,125.77c3-3.2,6.43-5.53,8-8.76,5.14-10.62,8.75-21.56,9.2-33.78.33-8.76,2.95-17.72,6.11-26,3.47-9.1,8.6-17.59,13.29-26.19,1.36-2.49,3.17-5.3,7.17-3.33.79.39,2.69-.83,3.73-1.72A13.45,13.45,0,0,1,733,22.67a14.1,14.1,0,0,0,7.23-.72,19.28,19.28,0,0,1,14.55,0c4.74,1.74,7.2,8.36,4.83,12.73a14.5,14.5,0,0,0-1.72,5.12c-.5,4.38-2.64,4.94-6.14,3.07-.88-.48-1.75-1-2.64-1.41-9.93-5-18.84-2-24.79,7.34-12.47,19.55-18.64,41.76-27.17,63C696.26,114.07,696.2,116.74,695.78,119Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M556.8,392.11c2.42.19,4.18.48,5.93.43a57.4,57.4,0,0,0,6.11-.69c.92-.12,2.36-.88,2.65-.55,3.3,3.71,7.37,1.67,11.14,1.69,6.19.05,10,2.93,9.36,9a230.06,230.06,0,0,1-5.67,31.25c-2.66,10.42-6.67,20.5-9.92,30.79-1.15,3.63-1.74,7.42-2.67,11.12-1.54,6.16.46,11,5.08,15.17,4.77,4.3,4.8,7.47-.18,11.34a31.33,31.33,0,0,1-23.46,6.41c-4.74-.56-7.51-4.23-8.94-8.52-2.92-8.74-3.6-17.44.54-26.2,7.34-15.54,8.47-32.69,12.43-49.11,2.27-9.42,2.17-18.33-1.49-27.27A26.51,26.51,0,0,1,556.8,392.11Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M777.88,140.09c-2.7-1.37-5.47-2.61-8-4.19a4,4,0,0,1-1.49-2.92c-.18-11.6-.41-22.82,4.25-34.27,3.76-9.24,10.4-14.63,17.06-20.65,3.32-3,7-5.7,10.56-8.38,1.15-.85,2.83-1.93,4-1.68,6.73,1.45,11.6-1.56,15.88-6.43.94.64,1.59,1.09,2.26,1.53,2.52,1.67,6.41,2.85,7.2,5.12.87,2.51-1.16,6-1.82,9.08-2.17,10.23-4.49,20.43-6.38,30.7-1.54,8.4-.23,15.82,10,19-6.06,6.79-12.22,11.7-19.76,14.63-3.27,1.28-5.69.13-5.51-3.87.23-5.14.8-10.26.88-15.4,0-1.48-1.16-3-1.78-4.46-.9,1-1.76,2-2.69,3-1.81,1.91-3.56,3.89-5.5,5.67-4.78,4.38-9.56,8.76-14.53,12.93-1.85,1.55-4.21,2.49-6.33,3.71Zm10.42-15.78c5.12-5.33,10.69-9.76,14.41-15.41,3.48-5.29,5.15-11.82,7.32-17.91a48.85,48.85,0,0,0,2.69-10.59c.57-4.76-1.91-6.8-6.34-5.09-8.42,3.24-14.86,9-18.19,17.47a57.63,57.63,0,0,0-3.49,14.49C784.1,112.53,782.58,118.23,788.3,124.31Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M601.17,341.32c-.62,4.86-1.29,8.33-1.47,11.82-.28,5.64-5.86,10.65-13.58,11.83-.65.09-1.32.07-2,.1-9.67.46-14.27-2.16-14.75-9.37-.58-8.58,1.8-15.73,11.79-17.2C588.41,337.44,595.71,337.4,601.17,341.32Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M1165,299l-.24.56c0-.09-.08-.23,0-.26a1.6,1.6,0,0,1,.38-.23Z" transform="translate(0 -20.28)"/><path class="cls-1" d="M1028.9,440.54c.15-.05.37-.17.42-.12a1.25,1.25,0,0,1,.16.46,1.71,1.71,0,0,1-.45-.09C1029,440.76,1028.94,440.63,1028.9,440.54Z" transform="translate(0 -20.28)"/></svg>
        </div>
        <div class="list-container">
            <ul class="list">
                <li>
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                @isset(auth()->user()->id_rol)
                @if (auth()->user()->id_rol ==1)
                <li>
                    <a href="{{url('dashboard')}}">Dashboard</a>
                </li>
                @endif
                @endisset
                <li>
                    @include('layouts.mini_cart')
                </li>

                <li>
                    <a href="">Contacto</a>
                </li>
                <li>
                    <a href="">Conócenos</a>
                </li>
                <li>
                    <a href="">Preguntas Frecuentes</a>
                </li>
                <li>
                    <a href="{{ url('category') }}">Ordena Aquí</a>
                </li>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </ul>
           
        </div>  
        <div class="shadow">     
        </div> 
    </div>
    
    <!--Contenido-->
    @yield('content') 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.6.2/rellax.js"></script>
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>


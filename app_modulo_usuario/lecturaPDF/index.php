<?php
    include("../../scriptsPHP/manejoSesion.inc");
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Libro</title>
        <link rel="stylesheet" type="text/css" href="../style/lectura.css">
        <link rel="stylesheet" type="text/css" href="../../styles/base.css">
        <link rel="stylesheet" type="text/css" href="../../styles/componentes.css">
        <link rel="stylesheet" type="text/css" href="../../styles/modoOscuro.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.js" integrity="sha512-JO0HvUFRjsan1fqrOEn9XWzZj/+/0pyXHy6NbBmRocxN9EdUvyvgwwnd23JeQBNetqESMVBDbVHfN5ZveTc0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf_viewer.js" integrity="sha512-er1tUZc+EDdEnVRHGxyRXzmcTi4ctv3pPf1M8WdE98PAcQFxtTfaiWbpNVJYtK0Rs2EWbsqeaKmN3WdAWw0fhw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body id="body">
    <header class="header" id="home">
                <a href="../menu/" class="header-volver">
                    <svg width="11" height="18" viewBox="0 0 11 18"  xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.96049 2.84832e-05C9.19701 -0.00133894 9.43147 0.0439936 9.65043 0.133428C9.86939 0.222863 10.0685 0.354643 10.2365 0.521206C10.4049 0.688275 10.5386 0.887041 10.6299 1.10604C10.7211 1.32504 10.7681 1.55994 10.7681 1.79719C10.7681 2.03443 10.7211 2.26933 10.6299 2.48833C10.5386 2.70733 10.4049 2.9061 10.2365 3.07317L4.28788 8.98582L10.0028 14.9344C10.3376 15.2711 10.5254 15.7266 10.5254 16.2014C10.5254 16.6762 10.3376 17.1317 10.0028 17.4684C9.83577 17.6368 9.637 17.7705 9.418 17.8618C9.199 17.953 8.9641 18 8.72686 18C8.48961 18 8.25471 17.953 8.03571 17.8618C7.81671 17.7705 7.61794 17.6368 7.45088 17.4684L0.513848 10.2798C0.18456 9.94383 0.000117216 9.49217 0.000117258 9.02176C0.000117299 8.55135 0.18456 8.09969 0.513848 7.76375L7.70248 0.575118C7.86379 0.400916 8.05801 0.260403 8.27394 0.161694C8.48986 0.0629855 8.72321 0.00803886 8.96049 2.84832e-05V2.84832e-05Z" />
                    </svg>
                </a>
            <div class="pdf-controles-zoom">
                <button id="menosZoom">
                    <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.897 14.312C11.4988 15.4054 9.77498 15.9996 8 16C3.589 16 0 12.411 0 8C0 3.589 3.589 0 8 0C12.411 0 16 3.589 16 8C15.9996 9.77544 15.405 11.4997 14.311 12.898L18.707 17.294L17.293 18.708L12.897 14.312ZM14 8C14 4.691 11.309 2 8 2C4.691 2 2 4.691 2 8C2 11.309 4.691 14 8 14C11.309 14 14 11.309 14 8ZM12 7H4V9H12V7Z" />
                    </svg>
                </button>
                <input type="text" id="zoomActual" value="100%">
                <button id="masZoom">
                    <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 3.589 3.589 0 8 0C12.411 0 16 3.589 16 8C15.9996 9.77544 15.405 11.4997 14.311 12.898L18.707 17.294L17.293 18.708L12.897 14.312C11.4988 15.4054 9.77498 15.9996 8 16C3.589 16 0 12.411 0 8ZM2 8C2 11.309 4.691 14 8 14C11.309 14 14 11.309 14 8C14 4.691 11.309 2 8 2C4.691 2 2 4.691 2 8ZM7 7V4H9V7H12V9H9V12H7V9H4V7H7Z"/>
                    </svg>
                </button>
            </div>
            <button class="header-modo" id="dos-pagina">
                <svg width="20" height="17" viewBox="0 0 20 17" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.0001 0.339972C18.8501 0.220808 18.6745 0.138026 18.4871 0.0981202C18.2997 0.0582146 18.1057 0.0622712 17.9201 0.109971L11.0001 1.88997V16.16L18.5601 14.22C18.8305 14.1508 19.07 13.993 19.2403 13.7719C19.4107 13.5508 19.5021 13.2791 19.5001 13V1.31997C19.497 1.1293 19.4504 0.941866 19.3637 0.772005C19.2771 0.602144 19.1527 0.454362 19.0001 0.339972ZM9.00011 1.88997L2.06011 0.109971C1.87741 0.0676657 1.6876 0.066349 1.50432 0.106116C1.32105 0.145884 1.14885 0.225748 1.00011 0.339972C0.848542 0.458473 0.726372 0.610363 0.643116 0.783813C0.55986 0.957263 0.517766 1.14759 0.520113 1.33997V13C0.520323 13.2774 0.612802 13.5468 0.782983 13.7659C0.953164 13.9849 1.19138 14.1412 1.46011 14.21L9.00011 16.16V1.88997Z"/>
                    </svg>
            </button>
        </header>
    
        <section class="seccion-pdf">
            <div id="pdf" class="pdf-contenedor">
                <canvas id="pdf-renderer" class="pdf-canvas"></canvas>
                <canvas id="pdf-2-renderer" class="pdf-canvas none"></canvas>
            </div>
        </section>
    
        <footer class="footer">
            <div class="pdf-controles-pagina">
                <button id="paginaAnterior">
                    <svg width="21" height="18" viewBox="0 0 21 18"  xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.284 7.7152H4.03678L8.70351 2.10999C8.92172 1.84745 9.02671 1.50898 8.99536 1.16903C8.96402 0.829086 8.79892 0.515513 8.53638 0.297298C8.27384 0.0790819 7.93536 -0.0259025 7.59542 0.00544001C7.25547 0.0367826 6.9419 0.201885 6.72368 0.464426L0.295688 8.17802C0.252441 8.23937 0.213769 8.30383 0.179984 8.37086C0.179984 8.43514 0.179984 8.47371 0.0899922 8.53799C0.0317204 8.68539 0.0012099 8.8423 0 9.0008C0.0012099 9.1593 0.0317204 9.31621 0.0899922 9.46362C0.0899922 9.5279 0.0899918 9.56647 0.179984 9.63075C0.213769 9.69778 0.252441 9.76223 0.295688 9.82359L6.72368 17.5372C6.84456 17.6823 6.99592 17.799 7.16702 17.879C7.33811 17.959 7.52473 18.0003 7.71359 18C8.01398 18.0006 8.30508 17.896 8.53638 17.7043C8.66656 17.5964 8.77416 17.4638 8.85304 17.3143C8.93191 17.1647 8.9805 17.001 8.99603 16.8326C9.01155 16.6643 8.9937 16.4945 8.94351 16.333C8.89331 16.1715 8.81176 16.0215 8.70351 15.8916L4.03678 10.2864H19.284C19.6249 10.2864 19.9519 10.151 20.193 9.90986C20.4341 9.66876 20.5696 9.34177 20.5696 9.0008C20.5696 8.65984 20.4341 8.33284 20.193 8.09175C19.9519 7.85065 19.6249 7.7152 19.284 7.7152Z" />
                    </svg>
                </button>
                <div class="pdf-control-numero">
                    <input type="number" id="paginaActual" value="1">
                    <button id="paginaInput">Ir</button>
                </div>
                <button id="paginaSiguiente">
                    <svg width="21" height="18" viewBox="0 0 21 18"  xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.28559 10.2848L16.5328 10.2848L11.8661 15.89C11.6479 16.1525 11.5429 16.491 11.5742 16.831C11.6056 17.1709 11.7707 17.4845 12.0332 17.7027C12.2957 17.9209 12.6342 18.0259 12.9742 17.9946C13.3141 17.9632 13.6277 17.7981 13.8459 17.5356L20.2739 9.82198C20.3171 9.76063 20.3558 9.69617 20.3896 9.62914C20.3896 9.56486 20.3896 9.52629 20.4796 9.46201C20.5379 9.31461 20.5684 9.1577 20.5696 8.9992C20.5684 8.8407 20.5379 8.68379 20.4796 8.53638C20.4796 8.4721 20.4796 8.43353 20.3896 8.36925C20.3558 8.30222 20.3171 8.23777 20.2739 8.17641L13.8459 0.462819C13.725 0.317697 13.5737 0.200989 13.4026 0.120998C13.2315 0.0410064 13.0449 -0.000304748 12.856 1.95624e-06C12.5556 -0.000584963 12.2645 0.104031 12.0332 0.295689C11.903 0.403614 11.7954 0.536162 11.7165 0.685737C11.6377 0.835313 11.5891 0.998978 11.5736 1.16736C11.558 1.33574 11.5759 1.50554 11.6261 1.66701C11.6763 1.82849 11.7578 1.97848 11.8661 2.10838L16.5328 7.7136L1.28559 7.7136C0.944632 7.7136 0.617634 7.84904 0.376537 8.09014C0.135441 8.33124 -4.90536e-06 8.65823 -4.93517e-06 8.99919C-4.96498e-06 9.34016 0.135441 9.66715 0.376537 9.90825C0.617634 10.1493 0.944632 10.2848 1.28559 10.2848Z"/>
                    </svg>
                </button>
            </div>
        </footer>

        <script type="module"  src="script.js"></script>
    </body>
    </html>
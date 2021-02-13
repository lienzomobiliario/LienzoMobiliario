var fullGalleryData = []
    .concat(specialDesign)
    .concat(homeOffice)
    .concat(archFurniture)
    .concat(spaceOptimization)

$(window).on('load', () => {
    setFilters()
    Galleria.loadTheme('assets/lib/galleria/twelve/galleria.twelve.js');
    Galleria.run('.galleria', {
        dataSource: fullGalleryData,
        _locale: {
            show_thumbnails: "Mostrar miniaturas",
            hide_thumbnails: "Ocultar miniaturas",
            play: "Reproducir imagenes",
            pause: "Pausar imagenes",
            enter_fullscreen: "Activar modo toda la pantalla",
            exit_fullscreen: "Salir de toda la pantalla",
            popout_image: "Abrir imagen",
            showing_image: "Mostrando imagen %s de %s"
        }
    });
    Galleria.configure({
        _showFullscreen: false
    });
});

const setFilters = () => {
    $.each($("#filters").children("li"), (i, e) => {
        const anchor = $(e).children("a")[0];
        const filter = $(anchor).data('filter');
        $(anchor).click((e) => {
            e.preventDefault();
            switch (filter) {
                case '*':
                    $('.galleria').data('galleria').load(fullGalleryData);
                    break;
                case '.specialDesign':
                    $('.galleria').data('galleria').load(specialDesign);
                    break;
                case '.homeOffice':
                    $('.galleria').data('galleria').load(homeOffice);
                    break;
                case '.archFurniture':
                    $('.galleria').data('galleria').load(archFurniture);
                    break;
                case '.spaceOptimization':
                    $('.galleria').data('galleria').load(spaceOptimization);
                    break;
                default:
                    $('.galleria').data('galleria').load(specialDesign);
                    break;
            }
        })
    });
}

const openHome = () => {
    openPhotoSwipe(homeOffice)
}

const openSpecialDesign = () => {
    openPhotoSwipe(specialDesign)
}
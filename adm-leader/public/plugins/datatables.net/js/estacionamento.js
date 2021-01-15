$(document).ready(function () {
    $('.data-table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        responsive: true,
        select: true,
        'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': ['nosort']
            }]

    });
});
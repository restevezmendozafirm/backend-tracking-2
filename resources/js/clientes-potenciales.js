const perPageSelect = document.getElementById("perPage");
const table = document.querySelector("table");
const filtro = document.getElementById("filtroPago");
const filtroEnviadoCal = document.getElementById("filtroEnviadoCal");

function handleFiltroPago() {
    const filtro_pago = filtro;
    const filas = document.querySelectorAll('tr[data-pago]');
    let totalRegistrosMostrados = 0; // Variable para contar registros visibles
    var rows = document.getElementsByClassName('cliente-row');
    console.log(filtro_pago.value)

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var pago = row.getAttribute('data-pago');

        if (filtro_pago.value === 'todos' || pago === filtro_pago.value) {
            row.style.display = '';
            totalRegistrosMostrados++;
        } else {
            row.style.display = 'none';
        }
    }

    document.getElementById('totalRegistrosNumero').textContent = totalRegistrosMostrados;
}

document.addEventListener("DOMContentLoaded", function () {
    const ths = table.querySelectorAll("thead th");
    let currentSortOrder = "asc"; // Estado inicial: orden ascendente

    ths.forEach((th) => {
        th.addEventListener("click", () => {
            const dataType = th.getAttribute("data-sort");
            currentSortOrder = toggleSortOrder(currentSortOrder);
            sortTable(table, dataType, currentSortOrder);
        });
    });

    const searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("input", () => {
        const searchTerm = searchInput.value.toLowerCase().trim();
        filterTable(table, searchTerm);
    });

    perPageSelect.addEventListener("change", handlePerPageChange);

    if (filtroEnviadoCal) {
        filtroEnviadoCal.addEventListener("change", handlefiltroEnviadoCal);
    }

    const filtroEnviado = document.getElementById("filtroEnviado");
    if (filtroEnviado) {
        filtroEnviado.addEventListener("change", handleFiltroEnviadoChange);
    }
    const filtroEnviadoDazn = document.getElementById("filtroEnviadoDazn");
    if (filtroEnviadoDazn) {
        filtroEnviadoDazn.addEventListener("change", handlefiltroEnviadoDaznChange);
    }
    const filtroEnviadoDatos = document.getElementById("filtroEnviadoDatos");
    if (filtroEnviadoDatos) {
        filtroEnviadoDatos.addEventListener("change", handleFiltroEnviadoDatosChange);
    }
    // Obtén el elemento del mensaje
    const noResultsMessage = document.getElementById("noResultsMessage");

    if (filtro) {
        filtro.addEventListener("change", handleFiltroPago);
    }

    const downloadVisibleButton = document.getElementById("downloadVisible");
    downloadVisibleButton.addEventListener("click", handleDownloadVisibleClick);

    const fechaInicioInput = document.getElementById('fechaInicio');
    const fechaFinInput = document.getElementById('fechaFin');
    if (fechaFinInput) {
        fechaInicioInput.addEventListener('input', function () {
            const fechaInicio = new Date(fechaInicioInput.value);
            const fechaFin = new Date(fechaFinInput.value);
            
            // Obtiene la fecha actual
            const fechaActual = new Date();
            
            // Verifica si la fecha de inicio es mayor que la fecha de fin o mayor que la fecha actual
            if (fechaInicio > fechaFin || fechaInicio > fechaActual) {
                fechaInicioInput.value = '';
            }
        });
        fechaFinInput.addEventListener('input', function () {
            const fechaInicio = new Date(fechaInicioInput.value);
            const fechaFin = new Date(fechaFinInput.value);
            
            // Obtiene la fecha actual
            const fechaActual = new Date();
            
            // Verifica si la fecha de fin es menor que la fecha de inicio o mayor que la fecha actual
            if (fechaFin < fechaInicio || fechaFin > fechaActual) {
                fechaFinInput.value = '';
            }
        });
        
        const filtrarPorFechaBtn = document.getElementById('filtrarPorFecha');
        
        filtrarPorFechaBtn.addEventListener('click', function () {
            const fechaInicio = fechaInicioInput.value;
            const fechaFin = fechaFinInput.value;
            console.log(fechaInicio)
            // Recorre las filas de la tabla y muestra u oculta según el rango de fechas
            const filas = document.querySelectorAll('tbody tr');
            let totalRegistrosMostrados = 0;
    
            filas.forEach(function (fila) {
                const fechaCreacion = fila.querySelector('[data-type="fecha"]').textContent.split(' ')[0];
                const fechaActualizacion = fila.querySelector('[data-type="fechaact"]').textContent.split(' ')[0];
    
                if ((fechaCreacion >= fechaInicio && fechaCreacion <= fechaFin) ||
                    (fechaActualizacion >= fechaInicio && fechaActualizacion <= fechaFin)) {
                    fila.style.display = 'table-row';
                    totalRegistrosMostrados++;
                } else {
                    fila.style.display = 'none';
                }
            });
    
            // Actualiza el número de registros mostrados
            document.getElementById('totalRegistrosNumero').textContent = totalRegistrosMostrados;
    
            // Muestra el mensaje si no hay resultados
            const noResultsMessage = document.getElementById('noResultsMessage');
            if (totalRegistrosMostrados === 0) {
                noResultsMessage.style.display = 'block';
            } else {
                noResultsMessage.style.display = 'none';
            }
        });
    }
    
    
});

function toggleSortOrder(currentOrder) {
    return currentOrder === "asc" ? "desc" : "asc";
}

function sortTable(table, dataType, sortOrder) {
    const tbody = table.querySelector("tbody");
    const rows = Array.from(tbody.querySelectorAll("tr"));

    rows.sort((a, b) => {
        const aValue = a.querySelector(`td[data-type="${dataType}"]`).textContent.trim();
        const bValue = b.querySelector(`td[data-type="${dataType}"]`).textContent.trim();

        let result;

        if (dataType === "fecha" || dataType === "fechaact") {
            result = new Date(aValue) - new Date(bValue);
        } else {
            result = aValue.localeCompare(bValue);
        }

        return sortOrder === "asc" ? result : -result;
    });

    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    rows.forEach((row) => {
        tbody.appendChild(row);
    });
}

function filterTable(table, searchTerm) {
    const tbody = table.querySelector("tbody");
    const rows = tbody.querySelectorAll("tr");
    let noResults = true;
    let totalRegistrosMostrados = 0; 

    rows.forEach((row) => {
        const cells = row.querySelectorAll("td");

        let rowVisible = false;

        cells.forEach((cell) => {
            const cellText = cell.textContent.toLowerCase().trim();

            if (cellText.includes(searchTerm)) {
                rowVisible = true;
                noResults = false;
            }
        });

        if (rowVisible) {
            row.style.display = "";
            totalRegistrosMostrados++; // Incrementa el contador
        } else {
            row.style.display = "none";
        }
    });

    if (noResults) {
        noResultsMessage.style.display = "block";
    } else {
        noResultsMessage.style.display = "none";
    }
    // Actualiza el número de registros mostrados
    document.getElementById('totalRegistrosNumero').textContent = totalRegistrosMostrados;

    if (noResults) {
        noResultsMessage.style.display = "block";
    } else {
        noResultsMessage.style.display = "none";
    }
}

function handlePerPageChange() {
    const selectedValue = perPageSelect.value;
    const currentUrl = new URL(window.location.href);

    if (selectedValue === 'all') {
        currentUrl.searchParams.set("perPage", selectedValue);
    } else {
        currentUrl.searchParams.set("perPage", selectedValue);
    }

    window.location.href = currentUrl.toString();
}

function handlefiltroEnviadoCal() {
    const filtro_enviado = filtroEnviadoCal.value;
    const filas = document.querySelectorAll('tr[data-envio]');
    let totalRegistrosMostrados = 0; // Variable para contar registros visibles
    console.log(filtro_enviado);
    
    filas.forEach(function (fila) {
        const enviado = fila.getAttribute('data-envio');
        const pago = fila.querySelector('td[data-type="pago"]').textContent.trim() === 'Si';
        const comprobante = fila.querySelector('td[data-type="comprobante"]').textContent.trim() === 'Si';
        console.log(enviado);

        if ((filtro_enviado === 'todos') || (enviado === filtro_enviado && pago)) {
            fila.style.display = 'table-row';
            totalRegistrosMostrados++; // Incrementa el contador
        } else if (filtro_enviado === 'solo_enviado' && enviado === 'Enviado') {
            totalRegistrosMostrados++; // Incrementa el contador
            fila.style.display = 'table-row';
        } else if (filtro_enviado === 'no_enviado' && enviado === 'No Enviado') {
            totalRegistrosMostrados++; // Incrementa el contador
            fila.style.display = 'table-row';
        } else {
            fila.style.display = 'none';
        }
    })
    document.getElementById('totalRegistrosNumero').textContent = totalRegistrosMostrados;
}

function handlefiltroEnviadoDaznChange() {
    const filtro = filtroEnviadoDazn.value;
    const filas = document.querySelectorAll('tr[data-envio]');
    let totalRegistrosMostrados = 0; // Variable para contar registros visibles

    filas.forEach(function (fila) {
        const enviado = fila.getAttribute('data-envio');
        const tieneRev = fila.querySelector('td[data-type="dazn_conten"]').textContent.trim() === 'Si';
        const tieneInicio = fila.querySelector('td[data-type="dazn_registered"]').textContent.trim() === 'Si';
        const tieneFace = fila.querySelector('td[data-type="face"]').textContent.trim() === 'Si';
        const input_american = fila.querySelector('td[data-type="input_american"]').textContent.trim() === 'Si';

        if ((filtro === 'todos') || (enviado === filtro && tieneRev && tieneInicio && tieneFace && input_american)) {
            fila.style.display = 'table-row';
            totalRegistrosMostrados++; // Incrementa el contador
        } else if (filtro === 'solo_enviado' && enviado === 'Enviado') { // Agregamos esta condición
            totalRegistrosMostrados++; // Incrementa el contador
            fila.style.display = 'table-row';
        } else if (filtro === 'no_enviado' && enviado === 'No Enviado') { // Agregamos esta condición
            totalRegistrosMostrados++; // Incrementa el contador
            fila.style.display = 'table-row';
        }else {
            fila.style.display = 'none';
        }
    });
    document.getElementById('totalRegistrosNumero').textContent = totalRegistrosMostrados;
}

function handleFiltroEnviadoChange() {
    const filtro = filtroEnviado.value;
    const filas = document.querySelectorAll('tr[data-envio]');
    let totalRegistrosMostrados = 0; // Variable para contar registros visibles

    filas.forEach(function (fila) {
        const enviado = fila.getAttribute('data-envio');
        const tieneRev = fila.querySelector('td[data-type="rev"]').textContent.trim() === 'Sí';
        const tieneInicio = fila.querySelector('td[data-type="inicio"]').textContent.trim() === 'Sí';
        const tieneFace = fila.querySelector('td[data-type="face"]').textContent.trim() === 'Sí';

        if ((filtro === 'todos') || (enviado === filtro && tieneRev && tieneInicio && tieneFace)) {
            fila.style.display = 'table-row';
            totalRegistrosMostrados++; // Incrementa el contador
        } else if (filtro === 'solo_enviado' && enviado === 'Enviado') { // Agregamos esta condición
            totalRegistrosMostrados++; // Incrementa el contador
            fila.style.display = 'table-row';
        } else if (filtro === 'no_enviado' && enviado === 'No Enviado') { // Agregamos esta condición
            totalRegistrosMostrados++; // Incrementa el contador
            fila.style.display = 'table-row';
        }else {
            fila.style.display = 'none';
        }
    });
    document.getElementById('totalRegistrosNumero').textContent = totalRegistrosMostrados;
}

function handleFiltroEnviadoDatosChange() {
    const filtro = filtroEnviadoDatos.value;
    const filas = document.querySelectorAll('tr[data-envio]');
    let totalRegistrosMostrados = 0; // Variable para contar registros visibles

    filas.forEach(function (fila) {
        const enviado = fila.getAttribute('data-envio');
        if ((filtro === 'todos')) {
            fila.style.display = 'table-row';
            totalRegistrosMostrados++; // Incrementa el contador
        } else if (filtro === 'solo_enviado' && enviado === 'Enviado') { // Agregamos esta condición
            totalRegistrosMostrados++; // Incrementa el contador
            fila.style.display = 'table-row';
        } else if (filtro === 'no_enviado' && enviado === 'No Enviado') { // Agregamos esta condición
            totalRegistrosMostrados++; // Incrementa el contador
            fila.style.display = 'table-row';
        }else {
            fila.style.display = 'none';
        }
    });
    document.getElementById('totalRegistrosNumero').textContent = totalRegistrosMostrados;
}

function handleDownloadVisibleClick() {
    const visibleRows = getVisibleRows(table);
    const visibleData = [];

    visibleRows.forEach((row) => {
        const rowData = [];
        const cells = row.querySelectorAll("td");
        cells.forEach((cell) => {
            rowData.push(cell.textContent);
        });
        visibleData.push(rowData);
    });

    downloadCSV(visibleData);
}

function getVisibleRows(table) {
    const tbody = table.querySelector("tbody");
    const rows = tbody.querySelectorAll("tr");
    const visibleRows = [];

    rows.forEach((row) => {
        if (row.style.display !== "none") {
            visibleRows.push(row);
        }
    });

    return visibleRows;
}

function downloadCSV(data) {
    const columnHeaders = Array.from(document.querySelectorAll("thead th")).map((th) => th.textContent.trim());
    const allData = [columnHeaders, ...data];
    const csvContent = "data:text/csv;charset=utf-8," + allData.map((row) => row.join(",")).join("\n");
    const encodedURI = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedURI);
    link.setAttribute("download", "clientes_potenciales.csv");
    document.body.appendChild(link);
    link.click();
}

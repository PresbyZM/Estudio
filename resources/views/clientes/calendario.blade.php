@extends('../layouts.base_cliente')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/index.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="/css/clientes/calendario.css">

<div class="container animate__animated animate__fadeIn">
    
    <div class="banner">
        <h1>CALENDARIO</h1>
    </div>
    
    <div class="month-selector-container">
        <button id="prevMonth" class="month-nav-button">
            <i class="fa-solid fa-caret-left"></i>
        </button>

        <div class="calendar-month-container">
            <span class="calendar-month" id="calendarMonth" style="text-transform: uppercase;"></span>
            <span class="calendar-year" id="calendarYear"></span>
        </div>


        <button id="nextMonth" class="month-nav-button">
            <i class="fa-solid fa-caret-right"></i>
        </button>
    </div>

    <div class="calendar">
        <div id="calendarBody" class="calendar-body"></div>
    </div>
</div>
<div class="floating-button-container">
    <button class="floating-button">
        <span class="button-text">Nueva Solicitud</span>
        <span class="icon-circle">
            <i class="fas fa-plus"></i>
        </span>
    </button>
</div>
<script>
    
    const fechasEventos = @json($fechasEventos); 
    
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    function renderCalendar(month, year) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const days = [];

        for (let i = 1; i <= lastDay.getDate(); i++) {
            days.push(i);
        }

        const calendarBody = document.getElementById('calendarBody');
        document.getElementById('calendarMonth').innerText = firstDay.toLocaleString('es-ES', { month: 'long' });
        document.getElementById('calendarYear').innerText = year;
        calendarBody.innerHTML = `<div class="calendar-days">${days.map(day => {
            const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const isOccupied = fechasEventos.includes(dateStr);
            return `<div class="calendar-day ${isOccupied ? 'occupied' : ''}" ${!isOccupied ? `onclick="openPeticionForm('${dateStr}')"` : ''}>
                        ${day}
                        ${isOccupied ? `<i class="fas fa-camera event-icon"></i>` : ''}
                    </div>`;
        }).join('')}</div>`;
    }

    function openPeticionForm(fecha) {
        window.location.href = `/peticiones/create?dia_evento_peticion=${fecha}`;
    }

    document.getElementById('prevMonth').addEventListener('click', () => {
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
        currentYear = (currentMonth === 11) ? currentYear - 1 : currentYear;
        renderCalendar(currentMonth, currentYear);
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
        currentYear = (currentMonth === 0) ? currentYear + 1 : currentYear;
        renderCalendar(currentMonth, currentYear);
    });

    renderCalendar(currentMonth, currentYear);

    // NUEVO BOTONCITO JIJI :3
    document.querySelector('.floating-button').addEventListener('click', () => {
        window.location.href = '/peticiones/create';
    });
</script>

@endsection

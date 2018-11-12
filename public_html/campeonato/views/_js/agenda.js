$(function(){
    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event
    $('#color').colorpicker(); // Colopicker
    $('#time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true,
        showMeridian: false
    });  // Timepicker
    // Fullcalendar
    $('#calendar').fullCalendar({
	
        timeFormat: 'H(:mm)',
        header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
		lang:'pt-br',
        // Get all events stored in database
        events: 'http://localhost/sistsalon/dados-agenda/getEvents.php',
        // Pega o click no dia.
        dayClick: function(date, event, view) {
		
			
            currentDate = date.format(); //Pega a data clicada.
			var DataAtual = new Date(); //Pega a data Atual
			
                    var subDia = 1; 
                    
                    DataAtual.setDate(DataAtual.getDate() - subDia); // DataAtual menos um dia 

			if (date >= DataAtual) { // Se a data for maior ou igual a data atual então pode adicionar.  
					
				// Abrir modal para adicionar evento
				modal({
					// Adicionar botões no modal.
					buttons: {
						add: {
							id: 'add-event', // id do botão 
							css: 'btn-success', // classe botão
							label: 'salvar' // Buttons label
						}
					},
					title: 'Agendar horário no dia ' + date.format('DD/MM/YYYY') // Modal title
				});
			
			}else{  
				
				alert("não pode agendar!");
			
			}
 
        },
        // Event Mouseover
        eventMouseover: function(calEvent, jsEvent, view){
            var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';
            $("body").append(tooltip);
            $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function(e) {
                    $('.event-tooltip').css('top', e.pageY + 10);
                    $('.event-tooltip').css('left', e.pageX + 20);
                });
        },
        eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
        },
        // Handle Existing Event Click
        eventClick: function(calEvent, jsEvent, view) {
		
		// alert('teste');
		
            // Set currentEvent variable according to the event clicked in the calendar
            currentEvent = calEvent;
            // Open modal to edit or delete event
            modal({
                // Available buttons when editing
                buttons: {
                    delete: {
                        id: 'delete-event',
                        css: 'btn-danger',
                        label: 'Excluir'
                    },
                    update: {
                        id: 'update-event',
                        css: 'btn-success',
                        label: 'Atualizar'
                    }
                },
                title: 'Editar horário' ,
                event: calEvent
            });
        }
    });
    // Prepares the modal window according to data passed
    function modal(data) {
        // Set modal title
        $('.modal-title').html(data.title);
        // Clear buttons except Cancel
        $('.modal-footer button:not(".btn-default")').remove();
        // Set input values
        $('#title').val(data.event ? data.event.title : '');
        if( ! data.event) {
            // When adding set timepicker to current time
            var now = new Date();
            var time = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes());
        } else {
            // When editing set timepicker to event's time
            var time = data.event.date.split(' ')[1].slice(0, -3);
            time = time.charAt(0) === '0' ? time.slice(1) : time;
        }
        $('#time').val(time);
        $('#description').val(data.event ? data.event.description : '');
		if(data.event){ $('#funcionario').html('<option value="'+data.event.id_func+'">'+data.event.nome_func+'</option>').show(); }else{  $("#select_funcionario").html("– Escolha um estado –");  }
        $('#funcionario').val(data.event ? data.event.id_func : '');
        $('#servicos').val(data.event ? data.event.id_servico : '');
        $('#cliente').val(data.event ? data.event.id_cliente : '');
        $('#color').val(data.event ? data.event.color : '#3a87ad');
        // Create Butttons
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        //Show Modal
        $('.modal').modal('show');
    }
    // Handle Click on Add Button
    $('.modal').on('click', '#add-event',  function(e){
        if(validator(['title', 'description'])) {
            $.post('http://localhost/sistsalon/dados-agenda/addEvent.php', {
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
                funcionario: $('#funcionario').val(),
                servicos: $('#servicos').val(),
                cliente: $('#cliente').val(),
                date: currentDate + ' ' + getTime()
            }, function(result){

             // alert(result);      
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
            });
        }
    });
    // Handle click on Update Button
    $('.modal').on('click', '#update-event',  function(e){
        if(validator(['title', 'description'])) {
            $.post('http://localhost/sistsalon/dados-agenda/updateEvent.php', {
                id: currentEvent._id,
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
                funcionario: $('#funcionario').val(),
                servicos: $('#servicos').val(),
                cliente: $('#cliente').val(),                
                date: currentEvent.date.split(' ')[0]  + ' ' +  getTime()
            }, function(result){
			
			//$('.error').html('Teste Agora!');
			
                $('.modal').modal('hide'); // Deixa o modal como Hide
                $('#calendar').fullCalendar("refetchEvents");
            });
        }
    });
    // Handle Click on Delete Button
    $('.modal').on('click', '#delete-event',  function(e){
        $.get('http://localhost/sistsalon/dados-agenda/deleteEvent.php?id=' + currentEvent._id, function(result){
            $('.modal').modal('hide');
            $('#calendar').fullCalendar("refetchEvents");
        });
    });
    // Get Formated Time From Timepicker
    function getTime() {
        var time = $('#time').val();
        return (time.indexOf(':') == 1 ? '0' + time : time) + ':00';
    }
    // Dead Basic Validation For Inputs
    function validator(elements) {
        var errors = 0;
        $.each(elements, function(index, element){
            if($.trim($('#' + element).val()) == '') errors++;
        });
        if(errors) {
            $('.error').html('Por favor insira o título e descrição');
            return false;
        }
        return true;
    }
});

var CALENDAR = function () 
{ 

    var wrap, label,  
            months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"]; 
 
 	// ----------------------------------------------------- INIT ---------------------------------------------------
    function init(nuevoEnvoltorio) 
    { 
		wrap     = $(nuevoEnvoltorio || "#cal"); 
		label    = wrap.find("#label"); 
		wrap.find("#prev").bind("click.calendar", function () { switchMonth(false); }); 
		wrap.find("#next").bind("click.calendar", function () { switchMonth(true);  }); 
		label.bind("click", function () { switchMonth(null, new Date().getMonth(), new Date().getFullYear()); }); 
		label.click();
		
    } 
 
	// ----------------------------------------------------- SWITCH --------------------------------------------------- 
    function switchMonth(next, month, year) { 
		var curr = label.text().trim().split(" "), calendar, tempYear =  parseInt(curr[1], 10);
	    
	   
	    if (!month) 
	    { 
		    if (next) { 
		        if (curr[0] === "Diciembre") { 
		            month = 0; 
		        } else { 
		            month = months.indexOf(curr[0]) + 1;
		            
		        } 
		    } else { 
		        if (curr[0] === "Enero") { 
		            month = 11; 
		        } else { 
		            month = months.indexOf(curr[0]) - 1;
		            
		        } 
		    }
		}
		
		

		if (!year) 
		{ 
		    if (next && month === 0) 
		    { 
		        year = tempYear + 1; 
		    } else if (!next && month === 11) { 
		        year = tempYear - 1; 
		    } else { 
		        year = tempYear; 
	    	} 
		}

		$("#mesfecha").val(month+1);
		$("#aniofecha").val(year);

		calendar =  createCal(year, month); 

		$("#cal-frame", calendar);
		$("#textofecha").val("");
		$('#label').text(calendar.label);


	} 
 
 // ----------------------------------------------------- CREAR CALENDARIO ---------------------------------------------------
    function createCal(year, month) 
    { 
 		
    
    	var day = 1, i, j, haveDays = true,  
        startDay = new Date(year, month, day).getDay(), 
        daysInMonths = [31, (((year%4==0)&&(year%100!=0))||(year%400==0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31], 
        calendar = [];



	    if (createCal.cache[year]) { 
		    if (createCal.cache[year][month]) { 
		        return createCal.cache[year][month]; 
		    } 
		} else { 
		    createCal.cache[year] = {}; 
		}

		i = 0; 
		while (haveDays) 
		{ 
		    calendar[i] = []; 
		    for (j = 0; j < 7; j++) { 
		        if (i === 0) { 
		            if (j === startDay) { 
		                calendar[i][j] = day++; 
		                startDay++; 
		            } 
		        } else if (day <= daysInMonths[month]) { 
		            calendar[i][j] = day++; 
		        } else { 
		            calendar[i][j] = ""; 
		            haveDays = false; 
		        } 
		        if (day > daysInMonths[month]) { 
		            haveDays = false; 
		        } 
		    } 
		    i++; 
		}

		if (calendar[5]) { 
		    for (i = 0; i < calendar[5].length; i++) { 
		        if (calendar[5][i] !== "") { 
		            calendar[4][i] = "<span>" + calendar[4][i] + "</span><span>" + calendar[5][i] + "</span>"; 
		        } 
		    } 
		    calendar = calendar.slice(0, 5); 
		}

		for (i = 0; i < calendar.length; i++) { 
		    calendar[i] = "<tr><td>" + calendar[i].join("</td><td>") + "</td></tr>"; 
		}

		calendar = $("<table>" + calendar.join("") + "</table>").addClass("curr"); 

		$("td:empty", calendar).addClass("nil"); 

		if (month === new Date().getMonth()) { 
		    $('td', calendar).filter(function () { return $(this).text() === new Date().getDate().toString(); }).addClass("today"); 
		}

		createCal.cache[year][month] = { calendar : function () { return calendar.clone() }, label : months[month] + " " + year }; 

		return createCal.cache[year][month];
	}

	createCal.cache={};

	// ----------------------------------------------------- RETURN ---------------------------------------------------
	return { 
        init : init, 
        switchMonth : switchMonth, 
        createCal   : createCal 
    };

    
};


$(document).ready(function(){
	var cal = CALENDAR(); 
	cal.init();
})
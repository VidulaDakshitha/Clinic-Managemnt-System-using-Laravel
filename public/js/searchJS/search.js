            var doctors;
            var hospitals;
            var specilizations;
            $(function() {
               doctors = [{"label":"DR.Shantha Kumar","value":"1"},{"label":"DR A.K PROBHODANA RANAWEERA","value":"2"},{"label":"DR A.M. DEEPAL K. ATTANAYAKE","value":"3"},{"label":"DR(MRS) A.R.J.P. NIYAS","value":"4"},{"label":"any doctor","value":"5"}];
          
               specilizations = [{"label":"Asthma Surgeon","value":"201"},{"label":"Ear Infections Surgeon","value":"202"},{"label":"Hay Fever","value":"203"},{"label":"Cardio Surgeon","value":"204"},{"label":"Mental Health Surgeon","value":"205"},{"label":"Allergies","value":"206"},{"label":"Dermatitis","value":"207"},{"label":"Artharitis","value":"208"},{"label":"High Blood Pressure","value":"209"},{"label":"any specialization","value":"210"}];
              
               $("#doctor").autocomplete({  
                   minLength: 1,
                  source: doctors,
                  select: function( event, ui ) {
          
                      $( "#doctor_id" ).val(ui.item.value);
                      $( "#doctor" ).val( ui.item.label);
                      return false;
                  },
                 
              });
              
              
               $("#spec").autocomplete({  
                   minLength: 1,
                  source: specilizations,
                  select: function( event, ui ) {
          
                      $( "#spec_id" ).val(ui.item.value);
                      $( "#spec" ).val( ui.item.label);
                      return false;
                  },
                 
              });    
          
            });
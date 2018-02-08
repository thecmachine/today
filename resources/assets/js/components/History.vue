<template>
     <div class='row' id='history-gate'>
          <table class="table table-striped">
		<thead>
    		     <tr>
			<th>Date</th>
			<th v-for="question, indexq in questions">{{ question.slug  }}</th>
                     </tr>
                </thead>
          	<tbody>
                     <tr v-for="response, index in responses">
                          <td>{{ getHumanDate(index)  }}</td>
                          <td v-for="question, indexq in questions">{{ answers[response[question.id]].copy  }}</td>
                     </tr>
                </tbody>
          </table>
     </div>
</template>
<script>
     import moment from 'moment';
     export default{
          data: function(){
               return {
                    responses: [], 
                    questions: [],
                    answers: [], 
               }
          },
          mounted(){
               var app = this;
               axios.get('/responses')
                    .then(function(resp){
	                 console.log(resp.data);
                         app.responses = resp.data.days;  
                         app.questions = resp.data.questions;  
                         app.answers = resp.data.answers;  
                    })
                    .catch(function(resp){
                         console.log(resp);
                         alert("cant load responsses");
                    });

          },
          methods: {
              getHumanDate : function (date) {
                  return moment(date).format('MMMM Do YYYY, h:mm:ss a');
              }

          }
     }
</script>

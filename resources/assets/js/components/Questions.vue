<template>
     <div class='row' id='question-gate'>
          <form id="questions" action="#" @submit.prevent="saveAnswers()">
          <table  class="table table-striped">
          	<tbody>
                     <tr v-for="question, index in questions">
                          <td>{{ question.copy  }}</td>
                          <td>
                               <select :data-question-id="question.id">
                                    <option  :value="-1"  selected disabled hidden>Choose One</option>
                                    <option v-for="answer, indexa in answers" :value="answer.id">{{ answer.copy }}</option>
                               </select>
                          </td>
                     </tr>
                </tbody>
          </table>
          <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Save Daily Questions</button>
          </span> 
          </form>
     </div>
</template>
<script>
     export default{
          data: function(){
               return {
                    questions: [],
                    answers: []
               }
          },
          mounted(){
               var app = this;
               axios.get('/questions')
                    .then(function(resp){
                         console.log(resp);
                         if("complete" == resp.data){
                             $("#question-gate").html("<h4>You Answered Questions Today!</h4>");
                         }else{
                             app.questions = resp.data;
                         }  
                    })
                    .catch(function(resp){
                         console.log(resp);
                         alert("cant load questions");
                    });

               axios.get('/answers')
                    .then(function(resp){
                         app.answers = resp.data;
                    })
                    .catch(function(resp){
                         console.log(resp);
                         alert("cant load answers");
                    });

          },
          methods: {
               saveAnswers(){
                    var data = [];
                    var form = $('form#questions').find('select');
                    var valid = true;
                    $.each(form, function(key, value){
                         var answer = {};
                         answer.question_id = $(value).attr('data-question-id');
                         answer.answer_id = $(value).val();
                         if(!answer.answer_id){
                             valid = false;
                         }else{
                             data.push(answer);
                         }
                    });   
                    if(valid){
                         console.log(data);
                          
                         axios.post('/responses', {
                             response:  data,
                         })
                         .then(function (response) {
                             alert('Complete! Saved Answers for Today!');
			     window.location = window.location.href;
                         })
                         .catch(function (error) {
                             console.log(error);
                         });
                    }else{
                         alert("You must answer all the questions!");  
                         console.log("You Must answer all questions!");
                    }
               }
          }
     }
</script>

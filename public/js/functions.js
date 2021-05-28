let id = 1; //id usádo para nomear classes e ids de elemenetos criados
let click = 0; //Conta os clicks no botão de edição
let mealValue;
let weightValue;

//Adição de formulários para refeição
function addMeal() {
    id++

    let meal = document.createElement('input');
    meal.name = "mealName-" + id;
    meal.setAttribute('id', 'meal-' + id);
    meal.setAttribute('class', 'form-control mb-4 border-custom');
    meal.placeholder = "Refeição";
    meal.setAttribute('required', 'true');
    meal.style['min-width'] = '408px';
   
    let label1 = document.createElement('label');
    label1.for= 'meal-' + id;
    label1.setAttribute('id', 'label-1-' + id);
    label1.textContent='Refeição-' + id + ':';

    let weight = document.createElement('input');
    weight.name = "mealWeight-" + id;
    weight.setAttribute('id', 'weight-' + id);
    weight.setAttribute('class', 'form-control mb-4 border-custom');
    weight.placeholder = "Peso em gramas";
    weight.setAttribute('required', 'true');
    weight.style['min-width'] = '408px';

    let label2 = document.createElement('label');
    label2.for= 'weight-' + id;
    label2.setAttribute('id', 'label-2-' + id);
    label2.textContent='Peso-'+ id + ':';

    let input = document.getElementById('addmeal');
    let form = document.getElementById('meals');

    form.insertBefore(label1, input).appendChild(meal);
    form.insertBefore(label2, input).appendChild(weight);
}

//Remoção de formulários para refeição
function removeMeal() {
    if (id > 1) {
        let meal = document.getElementById('label-1-' + id);
        meal.remove();
        let weight = document.getElementById('label-2-' + id);
        weight.remove();
        id--
    }
}

//Edição de tabelas 

function edit(id1, id2, id3, id){
    let meal = document.getElementById(id1);
    let inputMeal = document.createElement('input');
    
    let weight = document.getElementById(id2);
    let inputWeight = document.createElement('input');

    let btn = document.getElementById(id3);
    
    if(click == 0){
        btn.textContent = "Cancelar";
        btn.setAttribute("class", "text-danger");

        mealValue = meal.textContent;
        inputMeal.setAttribute("class", 'form-control h-25 input-style');
        inputMeal.name='mealUpdate-' + id;
        inputMeal.value = mealValue;
        meal.textContent='';
        
        weightValue = weight.textContent;
        inputWeight.setAttribute("class", 'form-control h-25 input-style');
        inputWeight.name='weightUpdate-' + id;
        inputWeight.value = weightValue;
        weight.textContent='';
        
        meal.appendChild(inputMeal);
        weight.appendChild(inputWeight);
        click++
    }else if(click == 1 && meal.textContent == ""){
        inputMeal.remove();
        meal.textContent = mealValue;

        inputWeight.remove();
        weight.textContent = weightValue;

        btn.textContent = "Editar";
        btn.setAttribute("class", "text-primary");
        click--

    }   
}
let id = 1; //id usádo para nomear classes e ids de elemenetos criados

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
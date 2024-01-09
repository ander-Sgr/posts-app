const category = document.getElementById('category_id')
const inputCategory = document.getElementById('name-category')
const inputSlugCategory = document.getElementById('slug-category')

category.addEventListener('change', function(){
    let valueSelected = this.value
    if (valueSelected == 'add-category') {
        inputCategory.style.display = 'block'
        inputSlugCategory.style.display = 'block'
    }else{
        inputCategory.style.display = 'none'
        inputSlugCategory.style.display = 'none'
    }
    

})
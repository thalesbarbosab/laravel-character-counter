<script>
    function enableCharacterCounter(component_id, limit = 255)
    {
        let component = document.getElementById(component_id);
        let component_tag_name = component.tagName.toLowerCase();
        if((component_tag_name != 'input') && (component_tag_name != 'textarea')){
            console.error('Component ID: ' + component_id + ' is not input or textarea');
            return;
        }
        component.setAttribute('onkeyup','characterCounter(this.id,' + limit + ')');
        let span_limit = document.createElement('span');
        span_limit.classList.add('float-right');
        span_limit.id = 'span-limit-' + component_id;
        component.insertAdjacentHTML('afterEnd', span_limit.outerHTML)
        span_limit.addEventListener('keyup',characterCounter(component_id, limit))
    }

    function characterCounter(component_id, limit)
    {
        let component = document.getElementById(component_id);
        let span_limit = document.getElementById('span-limit-' + component_id);
        let total = component.value.length;
        if (total <= limit) {
            let rest = limit - total;
            let warning = ((limit * 70 / 100) - limit) * (-1);
            span_limit.removeAttribute('class');
            span_limit.classList.add('float-left')
            if (rest > warning) {
                span_limit.classList.add('text-success');
            } else {
                if (rest <= 0) {
                    span_limit.classList.add('text-danger');
                } else {
                    span_limit.classList.add('text-warning');
                }
            }
            if (rest <= 1) {
                span_limit.innerHTML = rest + " caracter restante de " + limit;
            } else {
                span_limit.innerHTML = rest + " caracteres restantes de " + limit;
            }
        } else {
            component.value = component.value.substr(0, limit);
        }
    }
</script>

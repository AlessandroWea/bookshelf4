const SERVER_PATH = '/';

function sendRequestJSON(method, url, body = null)
{
    const headers = {
        'Content-Type' : 'application/json'
    }
    return fetch(url, {
        method: method,
        body: body ? JSON.stringify(body) : null,
        headers: headers
    }).then(response => {
        if(response.ok){
            return response.json()
        }

        return response.json().then(error => {
            const e = new Error('Smth went wrong')
            e.data = error
            throw e;
        })
    })
}

function sendRequest(method, url, body = null)
{
     return fetch(url, {
            method: method,
            body: body ? body : null,
        }).then(response => {
            if(response.ok){
                return response.json()
            }

            return response.json().then(error => {
                const e = new Error('Smth went wrong')
                e.data = error
                throw e;
            })
        })   
}



/**
    btn - button element
    list - where to put all received elements
    c_count - current count
    all_count - how many elements are at all
    page - where it is all happening
    edata - extra data to pass to php
*/
function lookMoreClickEventActivate(btn, list, make_func, c_count, all_count, url, edata = {})
{
    btn.addEventListener('click', () => {

        let data = {"current_count" : c_count};

        if(edata !== {})
        {
            Object.keys(edata).forEach(key => {
                data[key] = edata[key];
            })
        }

        let _url = SERVER_PATH + url;

        sendRequestJSON('POST', _url, data)
            .then(data => {
                c_count = data.new_count;
                make_func(list, data.content)

                if(c_count >= all_count)
                {
                    btn.style['display'] = 'none';
                }   
            })
            .catch(err => {
                console.error(err);
            })
    }); 
}

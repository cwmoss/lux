
function get_template(selector){
    let tpl = document.querySelector(selector).content
    let nodes = Array.from(tpl.querySelectorAll('*')).map((node, idx) => {
        let rules = []
        Array.from(node.attributes).forEach(({name, value}) => {
            console.log('attr:', name, value)
            if(name.startsWith('data-x-')){
                rules.push({t:'var', n:name.replace('data-x-', ''), v:value})
                return
            }
            if(name.startsWith('data-bind-')){
                rules.push({t:'bind', n:name.replace('data-bind-', ''), v:value})
                return
            }
            if(name.startsWith('data-html')){
                rules.push({t:'html', v:value})
            }
        })
        if(rules.length==0) return null
        
        return {
            i: idx,
            n: node,
            r: rules,
        }
    }).filter((e)=>e)

    console.log('f odes', nodes)

    return function(data){
        let ev_binds = []
        nodes.forEach((node)=>{
            node.r.forEach((r)=>{
                if(r.t == 'var'){
                    node.n.setAttribute(r.n, data[r.v])
                    return
                }
                if(r.t == 'html'){
                    node.n.innerHTML = data[r.v]
                    return
                }
                
                // else
                //node.n.addEventListener(r.n, data[r.v])
                //console.log("bound: name => func", r.n, data[r.v])
                ev_binds.push({i:node.i, r:r})
                
            })
        })
        let new_node = tpl.cloneNode(true)
        let new_nodes = Array.from(new_node.querySelectorAll('*'))
        ev_binds.forEach((r)=>{
            new_nodes[r.i].addEventListener(r.r.n, data[r.r.v])
        })
        return new_node
    }
}

let toggler = document.querySelectorAll('[data-toggle]')
let closers = document.querySelectorAll('[data-close]')
let dialog = document.querySelector("dialog") //document.querySelectorAll(target)
if(dialog){
    console.log("++ dialog registered")
    dialogPolyfill.registerDialog(dialog);
}


if (dialog) {

    let dialog_content = dialog.querySelector(".dialog-content")
    let tpl = get_template('template.gallery_item')
    
  toggler.forEach(function (element) {
    
    
    element.addEventListener("click", (event) => {
        let img = element.querySelector('img')
        
        console.log("bind dialog click", element, element.dataset)
        //console.log('template clone', node)
        //node.querySelector('img').setAttribute("src", img)
        let data = Object.assign({}, element.dataset, {
            image:img.getAttribute("src"), 
            'image_click':function(e){
                console.log('image click', e.target)
            },
            w: img.naturalWidth,
            h: img.naturalHeight
        })

        let node = tpl(data)

        if(dialog_content.hasChildNodes()) 
            dialog_content.removeChild(dialog_content.children[0])
        dialog_content.append(node)
        dialog.showModal()
    })
  })
  
  closers.forEach(function (element) {
    element.addEventListener("click", (event) => {
      // let dialog = element.closest('dialog')
      dialog.close()
    })
  })
}


// html

<div data-toggle data-big="$image_url($img, 'gallery_big')"><?=$image_tag($img, 'gallery')?></div>

<dialog id="dialog">
    <header>
      <button class="btn-close" data-close>
        &#x2715;
      </button>
    </header>
    <div class="dialog-content"></div>
    <template class="gallery_item">
        <div class="image">
            <img data-x-src="big" data-bind-click="image_click" class="lb-img">
        </div>
    </template>
</dialog>

// css

.dialog-content img{
  width: 100%;
  height: 100%;
  object-fit: contain;
}

[data-toggle]{
    cursor: pointer;
}

// polyfill 

dialog {
    position: absolute;
    left: 0; right: 0;
    width: -moz-fit-content;
    width: -webkit-fit-content;
    width: fit-content;
    height: -moz-fit-content;
    height: -webkit-fit-content;
    height: fit-content;
    margin: auto;
    border: solid;
    padding: 1em;
    background: white;
    color: black;
    display: block;
  }
  
  dialog:not([open]) {
    display: none;
  }
  
  dialog + .backdrop {
    position: fixed;
    top: 0; right: 0; bottom: 0; left: 0;
    background: rgba(0,0,0,0.1);
  }
  
  ._dialog_overlay {
    position: fixed;
    top: 0; right: 0; bottom: 0; left: 0;
  }
  
  dialog.fixed {
    position: fixed;
    top: 50%;
    transform: translate(0, -50%);
  }
  
  
  
  
  dialog {
    /* position: relative;
    z-index: 100; */
    width: 80%;
    max-width: 100%;
    padding: 1.5rem;
    height: 80%;
    border: none;
    border-radius: 2px;
  }
  
  dialog::backdrop {
      background-color: rgba(0,0,0,.8);
      // animation: 2s fade-in; 
    }
    dialog + .backdrop {
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        background: rgba(0,0,0,0.8);
      }
  
    dialog header{
        position: relative
    }
    dialog .btn-close{
        font-weight: 700;
        position: absolute;
        font-size: 12px;
        line-height: 1;
        padding:4px 6px;
        right:-1.2rem;
        top:-1.2rem;
        border: none;
        background-color: transparent;
    }
    dialog .btn-close:hover{
        border-radius: 2px;
        background-color: #ddd;
    }



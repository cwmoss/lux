console.log("mounted!")

/*
https://stackoverflow.com/questions/25308823/targeting-positionsticky-elements-that-are-currently-in-a-stuck-state
*/
if (typeof IntersectionObserver !== 'function') {
    // sorry, IE https://caniuse.com/#feat=intersectionobserver
    document.querySelector('header').classList.add('unsticky')

}else{
    const observer = new IntersectionObserver( 
        ([e]) => 
          e.target.toggleAttribute('stuck', e.intersectionRatio < 1),
          {threshold: [1]}
      );
      
    observer.observe(document.querySelector('header'));
}



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

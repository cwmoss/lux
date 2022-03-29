
export function nicedate(datum){
	console.log('preview datum', datum)
    if(!datum) return ""
    
    let days = ['So','Mo','Di','Mi','Do','Fr','Sa'];
    let dat = new Date(datum.replaceAll('-', '/'))
    let ndat = "" + days[ dat.getDay() ] + ', ' + dat.getDate()+'.'+(dat.getMonth()+1)+'.'+dat.getFullYear()
    return ndat
}
import React, {useState, useRef} from 'react'
import {GrSettingsOption} from  "react-icons/gr"
import PropTypes from 'prop-types'
import getIt from 'get-it'
import jsonResponse from 'get-it/lib/middleware/jsonResponse'
// const observable = require('get-it/lib/middleware/observable')
import promise from 'get-it/lib/middleware/promise'
import Button from 'part:@sanity/components/buttons/default'

import Spinner from 'part:@sanity/components/loading/spinner'

import styles from './deploy-website.css'

import {useSecrets, SettingsView} from 'sanity-secrets'

const namespace = "webDeploy"
const pluginConfigKeys = [
  {
    key: 'hook',
    title: 'URL for hook'
  },
  {
  key: 'apiKey',
  title: 'Your secret API key'
}]

/*
secrets document: secrets.webDeploy
*/

/*
const request = getIt([promise(), jsonResponse()])
request.use(
  observable({
    implementation: require('zen-observable')
  })
)
*/
const request = getIt()
/*request.use(
  observable({
    implementation: require('zen-observable')
  })
)*/


// const [showSettings, setShowSettings] = useState(false)

const deploy = function(site, secrets, setOutput, cb) {
    
    const xhr = new XMLHttpRequest()
    console.log("+++ widget options", site, secrets)

    setOutput("hello start\n++++\n!!!!")

    xhr.open("POST", site.url, true)
    xhr.setRequestHeader('X-Slft-Deploy', site.token)

    xhr.onprogress = function(e) {
     console.log("progress")
     console.log(e)

     var outp = e.currentTarget.responseText
     console.log(outp)
     setOutput(outp)
    }
    xhr.onreadystatechange = function () {
      if(xhr.readyState === XMLHttpRequest.DONE) { // && xhr.status === 200
        cb()
      }
    }
    xhr.send()
  }



  function DeployWebsite(props) {

    console.log("++++ component START", props)

    const site = props.site

    

    const {secrets} = useSecrets(namespace)

    console.log("++++ component START2", site, secrets)

    const [showSettings, setShowSettings] = useState(false)
    const [loading, setLoading] = useState(false)
    const [output, setOutput] = useState("")

    const owindow = useRef(null);

    let error = false


    //console.log(props)

    if (error) {
      return <pre>{JSON.stringify(error, null, 2)}</pre>
    }
    const spin = <Spinner inline={true} />


    let do_deploy = function(){
      setLoading(true);
      deploy(site, secrets, setOutput, function(){
        setLoading(false)
      });
    }

    return (
      

      <div className={styles.container}>
        <header className={styles.header}>
          <h2 className={styles.title}>Seite aktualisieren: {site.name} <span onClick={()=>{setShowSettings(true)}} title="settings"><GrSettingsOption /></span>
          { loading ? spin : null }</h2>
          
        </header>
        {showSettings && (
        <SettingsView
        namespace={namespace}
        keys={pluginConfigKeys}
        onClose={() => {
          setShowSettings(false)
        }}
        />)}
        <div className={styles.footer}>
            <Button bleed color="primary" kind="simple" onClick={do_deploy}>
              publish
            </Button>
          </div>

          <div ref={owindow} className={styles.content}>
          <div dangerouslySetInnerHTML={{ __html: output }} />
        </div>
      </div>
    )
  }


export default {
  name: 'deploy-website',
  component: DeployWebsite
}

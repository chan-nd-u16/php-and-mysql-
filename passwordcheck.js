document.getElementsByClassName('pas')[0].addEventListener('input',check)

document.getElementsByClassName('pas')[0].addEventListener('keydown',check)


let wid=0
function check(){
    
    ch=''
    
    
    
    let pas=document.getElementsByClassName('pas')[0].value
    if(pas.length>=1){
        
        
           for(i in pas){
            if(pas.length>5){
            
                if(((pas.charCodeAt(i)>=33)&&(pas.charCodeAt(i)<=47))||((pas.charCodeAt(i)>=58))&&(pas.charCodeAt(i)<=64)){
                    ch+='H'
                    
                }
            }
                if((pas.charCodeAt(i)>=65)&&(pas.charCodeAt(i)<=90)){
                    ch+='M'
                }
                if((pas.charCodeAt(i)>=48)&&(pas.charCodeAt(i)<=57)){
                    ch+='W'

                }
            
           }

           
        
          if((ch.includes('H'))&&(ch.includes('M'))&&(ch.includes('W'))){
            if(pas.length>5){
                ch='strong'
            wid=25
            col='green'

            }
            


          }
          else if(((ch.includes('H'))&&(ch.includes('M')))||((ch.includes('H'))&&(ch.includes('W')))||((ch.includes('M'))&&(ch.includes('W')))){
            ch='medium'
            wid=15
            col='yellow'
          }
          else{
            ch='weak'
            wid=5
            col='red'

          }

          document.getElementsByClassName('hh')[0].style.width=wid+'%'
          document.getElementsByClassName('hh')[0].setAttribute('color',col)

          document.getElementsByClassName('res')[0].innerHTML=ch
          
}
else if(pas.length<1){
document.getElementsByClassName('res')[0].innerHTML="Enter password"
document.getElementsByClassName('hh')[0].style.width=0
}
}

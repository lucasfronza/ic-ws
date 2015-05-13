var consultou = false;
function consultacep(cep) {
  document.getElementById('spinner').style.display = "";
  cep = cep.replace(/\D/g,"")
  url="http://cep.correiocontrol.com.br/"+cep+".js"
  s=document.createElement('script')
  s.setAttribute('charset','utf-8')
  s.src=url
  document.querySelector('head').appendChild(s)
  consultou = true;
}

function correiocontrolcep(valor) {
  if (valor.erro && consultou == true) {
    alert('Cep não encontrado');        
    consultou = false;
    return;
  };
  document.getElementById('address').value=valor.logradouro
  //document.getElementById('bairro').value=valor.bairro
  document.getElementById('city').value=valor.localidade
  document.getElementById('state').value=valor.uf
  document.getElementById('spinner').style.display = "none";
}

function modalToggle(){
    $('#entrada-modal').modal('toggle');
}  
var novaEntrada = new Vue({
    el: '#nova-entrada',
    data: {                    
        formEntradas:  
            {id:"0",date:null,description:null,type:null,value:null},              
        erros:[]                    
    },
    methods:{
        salvar(){
            if(this.checkForm()){
                let dados = new FormData();
                console.log(this.formEntradas);
                    
                for (let i in this.formEntradas){
                    dados.append(i,this.formEntradas[i]);
                }
                console.log('FormData dados :'); 
                for(var pair of dados.entries()) {
                    console.log(pair[0]+ ':'+ pair[1]); 
                }
                
                if(this.formEntradas.id != 0){
                    dados.append('_method','patch');
                    axios.post(`http://localhost:8000/bills/${this.formEntradas.id}`,dados)
                    .then(res => {
                        console.log(res);})
                    .catch(err => console.log(err));
                
                }else{
                    axios.post('http://localhost:8000/bills',dados)
                    .then(res => {
                        console.log(res);})
                    .catch(err => console.log(err));
                }
                this.limpaForm();
                tabela.listarEntradas();
                modalToggle();                        
                
            }
        },
        editar(id){
                axios.get(`http://localhost:8000/bills/${id}`)
                .then(res => this.formEntradas = res.data.bill)
                .catch(err => console.log(err));  
                
        },                    
        checkForm() {
            if (this.formEntradas.date && this.formEntradas.description && this.formEntradas.value) {
                if(this.formEntradas.type != null)
                    return true;
            }

            this.erros = [];

            if (!this.formEntradas.date) {
                this.erros.push('O campo Data é obrigatório !');
            }
            if (!this.formEntradas.description) {
                this.erros.push('O campo Descrição é obrigatório !');
            }
            if (!this.formEntradas.value) {
                this.erros.push('O campo Valor é obrigatório !');
            }
            if (!this.formEntradas.type) {
                this.erros.push('O campo Tipo é obrigatório !');
            }
        },
        limpaForm(){
                this.formEntradas = {id:"0",date:null,description:null,type:null,value:null};
                this.erros = [];
        }
    }
});
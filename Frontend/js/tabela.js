var formatter = new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL'
});   
var tabela = new Vue({
    el: '#tabela',
    data: {
        entradas:[],
        currentPage: 1,
        pageCount: 0
    },
    methods:{
        reverseString(str) {
            return str.split('-').reverse().join('-').replaceAll('-','/');
        }
        ,                    
        format(val){
            return formatter.format(val);
        },
        listarEntradas(){
            axios.get('http://localhost:8000/bills')
            .then(res => this.entradas = res.data)
            .catch(err => console.log(err)); 
        }
        ,deletar(id){
            axios.delete(`http://localhost:8000/bills/${id}`)
                .then(res => {
                    console.log(res);
                    this.listarEntradas();})
                .catch(err => console.log(err));  
        }
    },
    created(){
         this.listarEntradas();                  
    }

});
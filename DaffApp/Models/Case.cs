using System;
using System.IO;
using System.Linq;
using Newtonsoft.Json;
using Newtonsoft.Json.Linq;

namespace LearnWinForm.Models;
    
    public class Case{
        public int id;
        public string? case1{get;set;}
        public string? case2;
        public string? case3;
        public string? case4;
        public string? case5;
        public string? case6;
        public string? case7;
        public string? case8;
        public string? case9;
        public string? case10;
        private readonly string _filePath="data/donnees.json";
        //constructeur
        public Case(string a="",string b="",string c="",string d="",string e="",string f="",string g="",string h="",string i="",string j=""){
            this.case1=a;
            this.case2=b;
            this.case3=c;
            this.case4=d;
            this.case5=e;
            this.case6=f;
            this.case7=g;
            this.case8=h;
            this.case9=i;
            this.case10=j;
            Console.WriteLine("mety ve eh!!");
        }
        //obtenir tous les valeur
        public List<Case> GetAllCase(){
            var jsonData = File.ReadAllText(_filePath);
            return JsonConvert.DeserializeObject<List<Case>>(jsonData) ?? new List<Case>();
        }
        //otenir une valeur par id
        public Case GetCaseById(int ids){
            var cases= GetAllCase();
            return cases.FirstOrDefault(p => p.id == ids);
        }
        //ajouter des nouveau donnees
        public void AddCase(Case val){
            var cases=GetAllCase();
            val.id = cases.Any() ? cases.Max(p => p.id)+1:1;
            cases.Add(val);
            SaveAllCase(cases);
        }
        //enregistrement
        private void SaveAllCase(List<Case> cases){
            var jsonData=JsonConvert.SerializeObject(cases,Formatting.Indented);
            File.WriteAllText(_filePath,jsonData);
        }
        //supprimer des cases
        public void DeleteCase(int ids){
            var cases = GetAllCase();
            var ca = cases.FirstOrDefault(p => p.id == ids);
            if(ca != null){
                cases.Remove(ca);
                SaveAllCase(cases);
            }
        }
        //modifier une case
        public void UpdateCase(Case val){
            var cases = GetAllCase();
            var ca = cases.FirstOrDefault(p => p.id == val.id);
            if(ca != null){
                ca.case1=val.case1;
                ca.case2=val.case2;
                ca.case3=val.case3;
                ca.case4=val.case4;
                ca.case5=val.case5;
                ca.case6=val.case6;
                ca.case7=val.case7;
                ca.case8=val.case8;
                ca.case9=val.case9;
                ca.case10=val.case10;
                SaveAllCase(cases);
            }
        }


}

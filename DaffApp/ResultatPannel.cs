using LearnWinForm.Models;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Windows.Forms;
using Newtonsoft.Json;
using Newtonsoft.Json.Linq;
namespace LearnWinForm;

partial class MainWindow
{
    public Panel mainResultatPanel = new Panel();
    public Panel souPanel = new Panel();
    public Panel infoPannel = new Panel();
    public Label lab = new Label();
    private JArray result =new JArray();
    private List<string> searchData;
    
    
    private void ResultatPannel()
    {
        
        mainResultatPanel.Location = new System.Drawing.Point(525,15);
        mainResultatPanel.Size = new System.Drawing.Size(660,770);
        mainResultatPanel.BackColor=Color.FromArgb(255,25,25,25);

        //liste
        
        souPanel.AutoScroll = true;
        souPanel.Location = new System.Drawing.Point(5,5);
        souPanel.Size = new System.Drawing.Size(650,720);
        souPanel.BackColor=Color.FromArgb(255,25,25,25);
        // souPanel.BorderStyle = BorderStyle.FixedSingle;
        int margin = 10;

        Case p= new Case();
        int jsonLength =p.GetAllCase().Count;
        List<int> allResult = new List<int>();


        mainResultatPanel.Controls.Add(souPanel);

        // EventHandler abc = new EventHandler(OnTextChanged);
        input[0].TextChanged += OnTextChanged;
        input[1].TextChanged += OnTextChanged;
        input[2].TextChanged += OnTextChanged;
        input[3].TextChanged += OnTextChanged;
        input[4].TextChanged += OnTextChanged;
        input[5].TextChanged += OnTextChanged;
        input[6].TextChanged += OnTextChanged;
        input[7].TextChanged += OnTextChanged;
        input[8].TextChanged += OnTextChanged;
        input[9].TextChanged += OnTextChanged;

        //information
        
        infoPannel.Location = new System.Drawing.Point(5,730);
        infoPannel.Size = new System.Drawing.Size(650,35);
        infoPannel.BackColor=Color.FromArgb(255,25,25,25);
        

            // Text=""+identifiant.Length,
            lab.Text=""+jsonLength;
            lab.AutoSize=false;
            lab.Location=new System.Drawing.Point(300,5);
            lab.Font = new Font("Arial",15,FontStyle.Bold);
            lab.ForeColor= Color.White;
        
        infoPannel.Controls.Add(lab);
        mainResultatPanel.Controls.Add(infoPannel);

        this.Controls.Add(mainResultatPanel);
    }
    private void OnTextChanged(object sender,EventArgs e){
      string[] searchText=new string[10];
      searchText[0]=input[0].Text.ToLower();
      searchText[1]=input[1].Text.ToLower();
      searchText[2]=input[2].Text.ToLower();
      searchText[3]=input[3].Text.ToLower();
      searchText[4]=input[4].Text.ToLower();
      searchText[5]=input[5].Text.ToLower();
      searchText[6]=input[6].Text.ToLower();
      searchText[7]=input[7].Text.ToLower();
      searchText[8]=input[8].Text.ToLower();
      searchText[9]=input[9].Text.ToLower();


      Case cc= new Case(searchText[0],searchText[1],searchText[2],searchText[3],searchText[4],searchText[5],searchText[6],searchText[7],searchText[8],searchText[9]);
      var cases = cc.GetAllCase();

      var results = cases.Where(
        p=>
          (string.IsNullOrEmpty(searchText[0]) || p.case1.ToLower().Contains(searchText[0])) &&
          (string.IsNullOrEmpty(searchText[1]) || p.case2.ToLower().Contains(searchText[1])) &&
          (string.IsNullOrEmpty(searchText[2]) || p.case3.ToLower().Contains(searchText[2])) &&
          (string.IsNullOrEmpty(searchText[3]) || p.case4.ToLower().Contains(searchText[3])) &&
          (string.IsNullOrEmpty(searchText[4]) || p.case5.ToLower().Contains(searchText[4])) &&
          (string.IsNullOrEmpty(searchText[5]) || p.case6.ToLower().Contains(searchText[5])) &&
          (string.IsNullOrEmpty(searchText[6]) || p.case7.ToLower().Contains(searchText[6])) &&
          (string.IsNullOrEmpty(searchText[7]) || p.case8.ToLower().Contains(searchText[7])) &&
          (string.IsNullOrEmpty(searchText[8]) || p.case9.ToLower().Contains(searchText[8])) &&
          (string.IsNullOrEmpty(searchText[9]) || p.case10.ToLower().Contains(searchText[9]))

      ).ToList();

      souPanel.Controls.Clear();
    
        int i=0;
        int margin=10;
        int nn = results.Count;
        lab.Text=""+nn;
        if(nn==0){
          btns.Enabled=true;
          btns.BackColor=Color.FromArgb(255,0,255,255);
        }else{
          btns.Enabled=false;
          btns.BackColor=Color.White;
        }
        foreach(var tmp in results){
            Button btn = new Button();
            btn.Text = "Id: "+(tmp.id);
            btn.BackColor= Color.Yellow;
            btn.Size = new System.Drawing.Size(145,60);
            int row =i/4;
            int col =i%4;
            btn.Location = new System.Drawing.Point(col*(145+margin),row*(40+(margin*3)));
            btn.Click += (sender,e)=> ResultatClick(sender,e,tmp.id);
            btn.Font = new Font("Arial",15,FontStyle.Bold);
            souPanel.Controls.Add(btn);
            // lab.Text=""+nn;
            i++;
        }



        mainResultatPanel.Controls.Add(souPanel);
        
        mainResultatPanel.Refresh();


  }
  private void ResultatClick(object sender,EventArgs e,int a){
        // public System.ComponentModel.IContainer fentreClick = null;
        Case p = new Case();
        Form newForm = new Form();
        newForm.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
        newForm.ClientSize = new System.Drawing.Size(500, 350);
        newForm.FormBorderStyle=FormBorderStyle.FixedDialog;
        newForm.StartPosition= FormStartPosition.CenterScreen;
        newForm.Text = "Identifiant: "+a;
        newForm.BackColor = Color.FromArgb(255,0,0,0);
        newForm.Show();



        Panel mainPanel = new Panel();
        mainPanel.Location = new System.Drawing.Point(1,1);
        mainPanel.Size = new System.Drawing.Size(300,350);
        mainPanel.BackColor = Color.Gray;
        
        TextBox[] inputs = new TextBox[10];
        
        for(int i=0;i<10;i++){
            inputs[i] = new TextBox{
                Multiline = true,
                Location = new System.Drawing.Point(5,10+i*33),
                Size = new System.Drawing.Size(285,30),
                Font = new Font("Arial",12,FontStyle.Bold),
                TextAlign= HorizontalAlignment.Center,
                BackColor=Color.FromArgb(255,255,255,255),
                ForeColor = Color.Black,
                ReadOnly=true
            };
            mainPanel.Controls.Add(inputs[i]);
        }
        inputs[0].Text=""+p.GetCaseById(a).case1;
        inputs[1].Text=""+p.GetCaseById(a).case2;
        inputs[2].Text=""+p.GetCaseById(a).case3;
        inputs[3].Text=""+p.GetCaseById(a).case4;
        inputs[4].Text=""+p.GetCaseById(a).case5;
        inputs[5].Text=""+p.GetCaseById(a).case6;
        inputs[6].Text=""+p.GetCaseById(a).case7;
        inputs[7].Text=""+p.GetCaseById(a).case8;
        inputs[8].Text=""+p.GetCaseById(a).case9;
        inputs[9].Text=""+p.GetCaseById(a).case10;
        
        Panel effacerPanel = new Panel();
        effacerPanel.Location = new System.Drawing.Point(300,1);
        effacerPanel.Size = new System.Drawing.Size(200,350);
        effacerPanel.BackColor= Color.Gray;

        Button effaceButon = new Button();
        effaceButon.Text="effacer";
        effaceButon.Location = new System.Drawing.Point(10,250);
        effaceButon.Size = new System.Drawing.Size(175,75);
        effaceButon.BackColor= Color.FromArgb(255,255,50,50);
        effaceButon.Font = new Font("Arial",15,FontStyle.Bold);
        effaceButon.Click += (sender,e)=> BtnClickEffacer(sender,e,a,newForm);
        
        Label lid = new Label();
        lid.Text=""+a;
        lid.Location = new System.Drawing.Point(10,50);
        lid.Size = new System.Drawing.Size(175,175);
        lid.TextAlign = ContentAlignment.MiddleCenter;
        // lid.BackColor= Color.Red;
        lid.Font = new Font("Arial",28,FontStyle.Bold);

        effacerPanel.Controls.Add(lid);
        effacerPanel.Controls.Add(effaceButon);
        newForm.Controls.Add(effacerPanel);
        this.Controls.Add(mainPanel);
        newForm.Controls.Add(mainPanel);
  }
  private void BtnClickEffacer(object sender,EventArgs e,int a,Form b){
    Case p = new Case();
    p.DeleteCase(a);
    b.Close();
    
    string[] searchText=new string[10];
      searchText[0]=input[0].Text.ToLower();
      searchText[1]=input[1].Text.ToLower();
      searchText[2]=input[2].Text.ToLower();
      searchText[3]=input[3].Text.ToLower();
      searchText[4]=input[4].Text.ToLower();
      searchText[5]=input[5].Text.ToLower();
      searchText[6]=input[6].Text.ToLower();
      searchText[7]=input[7].Text.ToLower();
      searchText[8]=input[8].Text.ToLower();
      searchText[9]=input[9].Text.ToLower();


      Case cc= new Case(searchText[0],searchText[1],searchText[2],searchText[3],searchText[4],searchText[5],searchText[6],searchText[7],searchText[8],searchText[9]);
      var cases = cc.GetAllCase();

      var results = cases.Where(
        p=>
          (string.IsNullOrEmpty(searchText[0]) || p.case1.ToLower().Contains(searchText[0])) &&
          (string.IsNullOrEmpty(searchText[1]) || p.case2.ToLower().Contains(searchText[1])) &&
          (string.IsNullOrEmpty(searchText[2]) || p.case3.ToLower().Contains(searchText[2])) &&
          (string.IsNullOrEmpty(searchText[3]) || p.case4.ToLower().Contains(searchText[3])) &&
          (string.IsNullOrEmpty(searchText[4]) || p.case5.ToLower().Contains(searchText[4])) &&
          (string.IsNullOrEmpty(searchText[5]) || p.case6.ToLower().Contains(searchText[5])) &&
          (string.IsNullOrEmpty(searchText[6]) || p.case7.ToLower().Contains(searchText[6])) &&
          (string.IsNullOrEmpty(searchText[7]) || p.case8.ToLower().Contains(searchText[7])) &&
          (string.IsNullOrEmpty(searchText[8]) || p.case9.ToLower().Contains(searchText[8])) &&
          (string.IsNullOrEmpty(searchText[9]) || p.case10.ToLower().Contains(searchText[9]))

      ).ToList();

      souPanel.Controls.Clear();
    
        int i=0;
        int margin=10;
        int nn = results.Count;
        lab.Text=""+nn;

        foreach(var tmp in results){
            Button btn = new Button();
            btn.Text = "Id: "+(tmp.id);
            btn.BackColor= Color.Yellow;
            btn.Size = new System.Drawing.Size(145,60);
            int row =i/4;
            int col =i%4;
            btn.Location = new System.Drawing.Point(col*(145+margin),row*(40+(margin*3)));
            btn.Click += (sender,e)=> ResultatClick(sender,e,tmp.id);
            btn.Font = new Font("Arial",15,FontStyle.Bold);
            souPanel.Controls.Add(btn);
            i++;
        }



        mainResultatPanel.Controls.Add(souPanel);
        
        mainResultatPanel.Refresh();


  }
}

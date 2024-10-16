namespace LearnWinForm;
using LearnWinForm.Models;

partial class MainWindow
{
    private TextBox[] input = new TextBox[10];
    string[] valueInput = new string[10];
    private Button btns = new Button();
    private void AjoutPannel()
    {
        Panel mainPanel = new Panel();
        mainPanel.Location = new System.Drawing.Point(15,15);
        mainPanel.Size = new System.Drawing.Size(500,700);
        mainPanel.BackColor=Color.FromArgb(255,25,25,25);

        for(int i=0;i<10;i++){
            input[i] = new TextBox{
                Multiline = true,
                Location = new System.Drawing.Point(10,30+i*65),
                Size = new System.Drawing.Size(475,60),
                Font = new Font("Arial",15,FontStyle.Bold),
                TextAlign= HorizontalAlignment.Center,
                BackColor=Color.FromArgb(255,20,20,20),
                ForeColor = Color.White
            };
            mainPanel.Controls.Add(input[i]);
        }
        
        

        this.Controls.Add(mainPanel);
        

        //buton panel
        Panel mainButtonPanel = new Panel();
        mainButtonPanel.Location = new System.Drawing.Point(15,725);
        mainButtonPanel.Size = new System.Drawing.Size(500,60);
        mainButtonPanel.BackColor= Color.White;
        

        
        btns.Text= "Ajouter";
        btns.Size = new System.Drawing.Size(499,59);
        btns.Location = new System.Drawing.Point(1,1);
        btns.Font = new Font("Arial",15,FontStyle.Bold);
        btns.Enabled=false;
        btns.Click += new EventHandler(BtnClick);
        btns.BackColor=Color.White;
        // btns.FlatStyle = FlatStyle.Flat;
        btns.FlatAppearance.BorderSize=0;
        
        
        mainButtonPanel.Controls.Add(btns);
        this.Controls.Add(mainButtonPanel);
    }
    private void BtnClick(object sender,EventArgs e){
        for(int i=0;i<10;i++){
            valueInput[i]=input[i].Text;
        }

        Case p = new Case(valueInput[0],valueInput[1],valueInput[2],valueInput[3],valueInput[4],valueInput[5],valueInput[6],valueInput[7],valueInput[8],valueInput[9]);
        p.AddCase(p);
        int margin = 10;


         int jsonLength =p.GetAllCase().Count;
        //interieur liste
        for(int i=0;i<jsonLength;i++){
            Button btn = new Button();
            btn.Text = "bouton "+(i+1);
            btn.BackColor= Color.Yellow;
            btn.Size = new System.Drawing.Size(145,60);
            int row =i/4;
            int col =i%4;
            btn.Location = new System.Drawing.Point(col*(145+margin),row*(40+(margin*3)));
            souPanel.Controls.Add(btn);
            lab.Text=""+jsonLength;
        }


        mainResultatPanel.Controls.Add(souPanel);
        
        mainResultatPanel.Refresh();
        MessageBox.Show("Nouvelle élément enregistrer");
    }
}

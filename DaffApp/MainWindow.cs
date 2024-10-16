namespace LearnWinForm;

public partial class MainWindow : Form
{
    private System.ComponentModel.IContainer components = null;

protected override void Dispose(bool disposing)
    {
        if (disposing && (components != null))
        {
            components.Dispose();
        }
        base.Dispose(disposing);
    }

    public MainWindow()
    {
        InitializeComponent();
    }
    private void InitializeComponent()
    {
        
        this.components = new System.ComponentModel.Container();
        this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
        this.ClientSize = new System.Drawing.Size(640, 480);
        this.FormBorderStyle=FormBorderStyle.FixedDialog;
        this.StartPosition= FormStartPosition.CenterScreen;
        this.BackColor=Color.FromArgb(255,25,25,25);
        this.Text = "Daff-App";
        this.Icon = new Icon("icon.ico");
        AjoutPannel();
        ResultatPannel();
    }
    //dotnet publish -c Release -r win-x64 --self-contained
    
    
}

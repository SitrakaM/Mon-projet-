namespace LearnWinForm;

static class Program
{
    [STAThread]
    static void Main()
    {   
        
        try{
            
            ApplicationConfiguration.Initialize();
        Application.EnableVisualStyles();
        Application.SetCompatibleTextRenderingDefault(false);
        Application.Run(new MainWindow());
        }
        catch(Exception ex){
            MessageBox.Show(ex.Message,"erreur");
        }
    }    
}
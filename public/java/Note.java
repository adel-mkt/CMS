// Code java cms calcul note
import java.util.Scanner;

public class Note{
    int coef_cc;
    int coef_partiel;
    int coef_examen;

    public Note(int coef_cc, int coef_partiel, int coef_examen){
        this.coef_cc = coef_cc;
        this.coef_partiel = coef_partiel;
        this.coef_examen = coef_examen;
    }

    public double moyenne(double cc, double partiel, double examen){
        System.out.println(this.coef_cc);
        return (this.coef_cc/100.) * cc + (this.coef_partiel/100.) * partiel + (this.coef_examen/100.) * examen;
    }

  public static void main(String[] args) {

    Scanner scan = new Scanner(System.in);

    System.out.println("Entre tes notes pour pfa: ");
    System.out.print("CC : ");
    int cc = scan.nextInt();
    System.out.print("Examen : ");
    int examen = scan.nextInt();

    if(cc >= 0 && cc <= 20 && examen >= 0 && examen <= 20){
        Note note = new Note(40, 0, 60);
        System.out.println("\nLa moyenne de PFA est : " + String.format("%.2f", note.moyenne(cc, 0.0, examen)) + "/20\n");
    }
    else System.out.println("\nLes notes doivent être entre 0 et 20");
    
    
  }
}
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <asm / io.h>

#define base 0x378 / * indirizzo di base della porta stampante * /

main (int argc, char ** argv)
{                    
  valore int;

  if (argc! = 2)
    fprintf (stderr, "Errore: numero di argomenti errato. Questo programma necessita di un argomento che sia un numero compreso tra 0 e 255. \ n"), exit (1);
  if (sscanf (argv [1], "% i", & value)! = 1)
    fprintf (stderr, "Errore: il parametro non è un numero. \ n"), exit (1);
  if ((valore <0) || (valore> 255))
    fprintf (stderr, "Errore: valore numerico non valido. Il numero del parametro deve essere compreso tra 0 e 255 \ n"), exit (1);
  if (ioperm (base, 1,1))
    fprintf (stderr, "Errore: impossibile ottenere la porta su% x \ n", base), exit (1);

  outb ((unsigned char) value, base);
}                                            
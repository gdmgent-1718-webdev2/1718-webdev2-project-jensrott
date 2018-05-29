import { Component, OnInit } from '@angular/core';
// import { ProfileDeleteModalComponent } from '../../components/profile-delete-modal/profile-delete-modal.component';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material';
import { TextDialogComponent } from '../../components/text-dialog/text-dialog.component';

@Component({
  selector: 'app-own-auctions-page',
  templateUrl: './own-auctions-page.component.html',
  styleUrls: ['./own-auctions-page.component.scss']
})
export class OwnAuctionsPageComponent implements OnInit {

  dialogResult: string;
  ngOnInit() {}
  constructor(public dialog: MatDialog) {}

  openDialog(): void {
    const dialogRef = this.dialog.open(TextDialogComponent, {
      width: '600px',
      data: 'This text is passed into the dialog',
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed');
      this.dialogResult = result;
    });
  }

}

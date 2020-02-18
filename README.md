# os_donut_widget
A custom OS Breakdown widget for MunkiReport 5 to display the information in a colored donut.

> v. 1.0.1  
> February 17, 2019  
> Alex Narvey / Precursor.ca

![OS Breakdown in colored donut](os_donut_widget.png)

A custom OS Breakdown widget for MunkiReport 5 to display the information in a colored donut.

You can cahnge colors by editing the values in ```var myColors```.

You show percentages instead of subtotals in ToolTips by commenting:

```	chart.tooltip.valueFormatter(function(d){```
```return (d);```

and uncommenting:

```chart.tooltip.valueFormatter(function(d){```
 ```return (d * 100/total).toFixed() + '%';```.

No warrantee is offered. Neither express nor implied. Use at your own risk.

Place in:
```munkireport-php/local/views/widgets``` folder.

And call using a .yml file ```os-donut:```

See the munkireport wiki on custom dashbaoards at: 

https://github.com/munkireport/munkireport-php/wiki/Dashboards

## Updates
• February 16, 2019 Version 1.0

• February 17, 2019 Version 1.0.1 - Arjen van Bochoven added a formatter to remove the decimal in the Tooltips and I provided an option to use percentages in Tooltips instead. Updated the graphic to show Tooltips without decimals. Provided customization instructions.

• February 17, 2019 Version 1.0.2 - Jon Crain fixed code to update when filters are applied.


## Contributors
• Alex Narvey

• Arjen van Bochoven

• Jon Crain

— Alex Narvey 

precursor.ca
